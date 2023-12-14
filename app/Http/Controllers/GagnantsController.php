<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gagnant;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Notifications\GagnantNotification;
use Illuminate\Support\Facades\Notification;

class GagnantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gagnants = Gagnant::all();
        $event=Evenement::all();
        $user=User::all();
        return view('admin.gagnants.index',compact('gagnants','event','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gagnants= gagnant::all();
        $user= User::all();
        $event=Evenement::all();
        return view('admin.gagnants.create',compact('gagnants','user','event'));
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
            'rang' => 'required'
        ]);
        $gagant= new Gagnant;
        $gagant->rang = $request->rang;
        $gagant->prix = $request->prix;
        $gagant->evenement_id = $request->evenement_id;
        $gagant->user_id = $request->user_id;
        $gagant->save();
        $user_id =$gagant->user_id;
        $user =User::where('id',$user_id)->get();
        $event_id=$gagant->evenement_id;
        $event =Evenement::where('id',$event_id)->get('titre');
        Notification::send($user,new GagnantNotification($event));
        return redirect()->route('admin.gagnants.index')
                        ->with('success',' gagnants created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gagnant  $Gagnant
     * @return \Illuminate\Http\Response
     */
    public function show(Gagnant $Gagnants)
    {
        return view('admin.Gagnants.show',compact('Gagnants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gagnant $Gagnant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $gagnants= gagnant::find($id);
        $user= User::all();
        $event=Evenement::all();
        return view('admin.gagnants.edit',compact('gagnants','user','event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gagnant $gagnants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'rang' => 'required'
        ]);
        $gagant=Gagnant::find($id);
        $gagant->rang = $request->rang;
        $gagant->prix = $request->prix;
        $gagant->evenement_id = $request->evenement_id;
        $gagant->user_id = $request->user_id;
        $gagant->save();
        $user_id =$gagant->user_id;
        $user =User::where('id',$user_id)->get();
        $event_id=$gagant->evenement_id;
        $event =Evenement::where('id',$event_id)->get('titre');
        Notification::send($user,new GagnantNotification($event));
        return redirect()->route('admin.gagnants.index')
                        ->with('success',' gagnants created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gagnant  $gagnants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $gagnants=gagnant::find($id);
        $gagnants->delete();

        return redirect()->route('admin.gagnants.index')
                        ->with('success',' gagnants deleted successfully');
    }
}

