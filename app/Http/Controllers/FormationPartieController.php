<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\FormationPartie;

class FormationPartieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $formationpartie = FormationPartie::all();
            return view('admin.formationpartie.index',compact('formationpartie'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formationpartie = FormationPartie::all();
        $formations= Formation::all();
        return view('admin.formationpartie.create',compact('formationpartie','formations'));
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
            'titre' => 'required'
        ]);

        $formationpartie = new FormationPartie();
        $formationpartie->titre = $request->titre;
        $formationpartie->description = $request->description;
        if($request->file('video')){
            $file= $request->file('video');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Video'), $filename);
            $formationpartie['video']= $filename;
        }
        $formationpartie->rang = $request->rang;
        if($request->file('fichier')){
            $file= $request->file('fichier');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('fichier/formation'), $filename);
            $formationpartie['fichier']= $filename;
        }
        $formationpartie->formation_id = $request->formation_id;
        $formationpartie->save();
        return redirect()->route('admin.formationpartie.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormationPartie  $formationPartie
     * @return \Illuminate\Http\Response
     */
    public function show(FormationPartie $formationPartie)
    {
        return view('admin.formationpartie.show',compact('formationpartie'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormationPartie  $formationPartie
     * @return \Illuminate\Http\Response
     */
    public function edit(FormationPartie $formationPartie ,$id)
    {
        $formationpartie= FormationPartie::find($id);
        $formations= Formation::all();

        return view('admin.formationpartie.edit',compact('formationpartie','formations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormationPartie  $formationPartie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormationPartie $formationPartie,$id)
    {
        $request->validate([
            'titre' => 'required'
        ]);

        $formationpartie =FormationPartie::find($id);
        $formationpartie->titre = $request->titre;
        $formationpartie->description = $request->description;
        if($request->file('video')){
            $file= $request->file('video');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Video'), $filename);
            $formationpartie['video']= $filename;
        }
        $formationpartie->rang = $request->rang;
        $formationpartie->fichier = $request->fichier;
        $formationpartie->formation_id = $request->formation_id;
        $formationpartie->save();
        return redirect()->route('admin.formationpartie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormationPartie  $formationPartie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formationpartie=FormationPartie::find($id);
        $formationpartie->delete();

        return redirect()->route('admin.formationpartie.index')
                        ->with('success',' formationpartie deleted successfully');
    }
    public function download($file_name) {
        $path = 'fichier\formation/';
        $file_path = public_path($path. $file_name);
        return response()->download($file_path);
      }
}
