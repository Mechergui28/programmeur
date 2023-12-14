<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\FormationInscription;

class FormationInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formation = FormationInscription::with('user','formation')->get();
        return view('admin.inscriptionformations.index',compact('formation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscription = FormationInscription::all();
        $formation= Formation::all();
        return view('admin.inscriptionformations.create',compact('inscription','formation'));
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
            'etat' => 'required'
        ]);

        $inscription = new FormationInscription();
        $inscription->etat = $request->etat;
        $inscription->user_id = $request->user_id;
        $inscription->formation_id = $request->formation_id;

        $inscription->save();
        return redirect()->route('admin.inscriptionformations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormationInscription  $formationInscription
     * @return \Illuminate\Http\Response
     */
    public function show(FormationInscription $formationInscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormationInscription  $formationInscription
     * @return \Illuminate\Http\Response
     */
    public function edit(FormationInscription $formationInscription , $id)
    {
        $inscriptions = FormationInscription::find($id);
        $formation= Formation::all();
        return view('admin.inscriptionformations.edit',compact('inscriptions','formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormationInscription  $formationInscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormationInscription $formationInscription , $id)
    {
        $request->validate([
            'etat' => 'required'
        ]);

        $inscription = FormationInscription::find($id);
        $inscription->etat = $request->etat;
        $inscription->user_id = $request->user_id;
        $inscription->formation_id = $request->formation_id;

        $inscription->save();
        return redirect()->route('admin.inscriptionformations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormationInscription  $formationInscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormationInscription $formationInscription,$id)
    {
        $inscription=FormationInscription::find($id);
        $inscription->delete();

        return redirect()->route('admin.inscriptionformations.index');
    }
}
