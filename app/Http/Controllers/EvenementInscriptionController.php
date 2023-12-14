<?php

namespace App\Http\Controllers;
use Notifiable;
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\EvenementInscription;
use Illuminate\Support\Facades\Notification;
use App\Notifications\inscriptionNotification;

class EvenementInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenementInscription = EvenementInscription::all();
        return view('admin.inscriptions.index',compact('evenementInscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscription = EvenementInscription::all();
        $event= Evenement::all();
        return view('admin.inscriptions.create',compact('inscription','event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|email|unique|users'
        ]);

        $inscription = new EvenementInscription();
        $inscription->etat = $request->etat;
        $inscription->user_id = $request->user_id;
        $inscription->evenement_id = $request->evenement_id;
        $inscription->save();
        return redirect()->route('admin.inscriptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvenementInscription  $evenementInscription
     * @return \Illuminate\Http\Response
     */
    public function show(EvenementInscription $evenementInscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvenementInscription  $evenementInscription
     * @return \Illuminate\Http\Response
     */
    public function edit(EvenementInscription $evenementInscription,$id)
    {
        $inscriptions = EvenementInscription::find($id);
        $event= Evenement::all();
        return view('admin.inscriptions.edit',compact('inscriptions','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvenementInscription  $evenementInscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvenementInscription $evenementInscription,$id)
    {
        $request->validate([
            'user_id' => 'required'
        ]);

        $inscription = EvenementInscription::find($id);
        $inscription->etat = $request->etat;
        $inscription->user_id = $request->user_id;
        $inscription->evenement_id = $request->evenement_id;

        $user_id =$inscription->user_id;
        $user =User::where('id',$user_id)->get();
        $event_id=$inscription->evenement_id;
        $inscri =Evenement::where('id',$event_id)->get('titre');
        Notification::send($user,new inscriptionNotification($inscri));
        $inscription->save();
        return redirect()->route('admin.inscriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvenementInscription  $evenementInscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvenementInscription $evenementInscription,$id)
    {
        $inscription=EvenementInscription::find($id);
        $inscription->delete();

        return redirect()->back();
    }
}
