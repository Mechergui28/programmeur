<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EtatPostulationNotification;

class PostulationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Postulation $postulations)
    {
        // $this->authorize('view', $postulations);
        $postulations = Postulation::all();
        return view('admin.postulations.index',compact('postulations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postulations= Postulation::all();
        $user= User::all();
        $annonce= Annonce::all();
        return view('admin.postulations.create',compact('postulations','user','annonce'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'postulations' => 'required',
        ]);

        $postulation = new Postulation();
        $postulation->postulations = $request->postulations;
        if($request->file('fichier')){
            $file= $request->file('fichier');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('fichier/postulation'), $filename);
            $postulation['fichier']= $filename;
        }
        $postulation->reponse = $request->reponse;
        $postulation->remarque = $request->remarque;
        $postulation->note = $request->note;
        $postulation->etat = $request->input('etat', 'en attente');
        $postulation->user_id = $request->user_id;
        $postulation->annonce_id = $request->annonce_id;
        $postulation->save();
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postulation=Postulation::find($id);
        $getid= DB::table('notifications')->where('data->postulation_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$getid)->update(['read_at'=>now()]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $postulations= Postulation::find($id);
        $user= User::all();
        $annonce= Annonce::all();
        return view('admin.postulations.edit',compact('postulations','user','annonce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
        ]);

        $postulation =Postulation::find($id);
        $postulation->reponse = $request->reponse;
        $postulation->remarque = $request->remarque;
        $postulation->note = $request->note;
        $postulation->etat = $request->etat;
        $postulation->update();
        $user_id=$postulation->user_id;
        // $user= User::whereIn($postulation->user_id)->get();
        $user =User::where('id',$user_id)->get();
        $etat=$postulation->postulations;
        Notification::send($user,new EtatPostulationNotification($etat));
        return redirect()->route('admin.postulations.index')
                        ->with('success',' postulation created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulation  $postulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postulation $postulation)
    {

    }

    public function download($file_name) {
        $path = 'fichier\postulation/';
        $file_path = public_path($path. $file_name);
        return response()->download($file_path);
      }
}
