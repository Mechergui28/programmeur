<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\User;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\FormationInscription;


class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return view('admin.formations.index',compact('formations'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations= Formation::all();
        $users= User::all();
        return view('admin.formations.create',compact('formations','users'));
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

        $formation = new Formation();
        $formation->titre = $request->titre;
        $formation->description = $request->description;
        if($request->File('image')) {

            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $formation['image']= $filename;

        }
        $formation->motcle = $request->motcle;
        $formation->prix = $request->prix;
        $formation->prerequis = $request->prerequis;
        $formation->dure = $request->dure;
        $formation->contenu = $request->contenu;
        $formation->user_id = $request->user_id;
        $formation->save();
        return redirect()->route('admin.formations.index')
                        ->with('success',' formations created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $Formations)
    {
        return view('admin.formations.show',compact('formations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $formations= Formation::find($id);
        $users= User::all();
        return view('admin.formations.edit',compact('formations','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formation=Formation::find($id);
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(800, 533);
            $image_resize->save(public_path('public/'.$filename) );
            $formation['image']= $filename;
        }
        $formation->titre=$request['titre'];
        $formation->description=$request['description'];
        $formation->motcle=$request['motcle'];
        $formation->prerequis = $request['prerequis'];
        $formation->dure = $request['dure'];
        $formation->contenu = $request['contenu'];
        $formation->save();
        return redirect()->route('admin.formations.index')
                        ->with('success',' formations updated successfully');
    }

    public function changepublicStatus(Request $request)
    {
        $formations = Formation::find($request->id);
        $formations->public = $request->public;
        $formations->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function inscription(Request $request)
    {
        $formations = Formation::find($request->id);
        $formations->avecinscription = $request->avecinscription;
        $formations->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function etat(Request $request)
    {
        $formations = Formation::find($request->id);
        $formations->etat = $request->etat;
        $formations->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function etatinscription(Request $request)
    {
        $formations = Formation::find($request->id);
        $formations->etatinscription = $request->etatinscription;
        $formations->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $formations=Formation::find($id);
        $formations->delete();

        return redirect()->route('admin.formations.index')
                        ->session()->flash('success',' formations deleted successfully');
    }

    public function storeinscriptionformation(Request $request)
    {
        $request->validate([
            'user_id' => 'required'
        ]);

        $inscription = new FormationInscription();
        $inscription->etat = $request->input('etat', 'en attente');
        $inscription->user_id = $request->user_id;
        $inscription->formation_id = $request->formation_id;
        $inscription->save();
        return redirect()->back();
    }

}
