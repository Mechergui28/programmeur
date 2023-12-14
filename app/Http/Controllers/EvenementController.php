<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\EvenementInscription;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::with('user')->get();
        return view('admin.evenements.index',compact('evenements'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evenements= Evenement::all();
        $users= User::all();
        return view('admin.evenements.create',compact('evenements','users'));
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
            'titre' => 'required',
            'datedebut'    => 'required|date',
            'datefin'      => 'required|date|after_or_equal:datedebut',
        ]);
        $event = new Evenement();
        $event->titre = $request->titre;
        $event->enonce = $request->enonce;
        if($request->file('fichier')){
            $file= $request->file('fichier');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('fichier/event'), $filename);
            $event['fichier']= $filename;
        }
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $event['image']= $filename;

        }
        $event->motcle = $request->motcle;
        $event->comite = $request->comite;
        $event->programme = $request->programme;
        $event->user_id = auth()->user()->id;

        $event->type = $request->type;
        $event->datedebut = $request->datedebut;
        $event->limite = $request->limite;
        $event->datefin = $request->datefin;
// dd($annonce);
        $event->save();

        return redirect()->route('admin.evenements.index')
                        ->with('success',' evenements created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evenement $evenement
     * @return \Illuminate\Http\Response
     */
    public function show(evenement $evenements)
    {
        return view('admin.evenements.show',compact('evenements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evenement $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $evenements= Evenement::find($id);
        $users= User::all();
        return view('admin.evenements.edit',compact('evenements','users'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evenement $evenement
     * @return \Illuminate\Http\Response
     */
    public function inscription(Request $request, $id)
    {

        $evenements= Evenement::find($id);
        $users= User::all();
        return view('admin.evenements.inscription',compact('evenements','users'));

    }
    public function storeinscription(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $inscription = new EvenementInscription();
        // $inscription->etat = $request->etat;
        $inscription->etat = $request->input('etat', 'en attente');
        $inscription->user_id = $request->user_id;
        $inscription->evenement_id = $request->evenement_id;
        $inscription->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\evenement $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'datedebut'    => 'required|date',
            'datefin'      => 'required|date|after_or_equal:datedebut',
        ]);
        $evenement=Evenement::find($id);
        $evenement->titre = $request->titre;
        $evenement->enonce = $request->enonce;
        if($request->file('fichier')){
            $file= $request->file('fichier');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('fichier/event'), $filename);
            $evenement['fichier']= $filename;
        }
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $evenement['image']= $filename;

        }
        $evenement->motcle = $request->motcle;
        $evenement->comite = $request->comite;
        $evenement->programme = $request->programme;
        $evenement->user_id = $request->user_id;
        $evenement->type = $request->type;
        $evenement->datedebut = $request->datedebut;
        $evenement->limite = $request->limite;
        $evenement->datefin = $request->datefin;
        $evenement->save();
        return redirect()->route('admin.evenements.index')
                        ->with('success',' evenements updated successfully');
    }

    public function avecinscription(Request $request)
    {
        $evenements = Evenement::find($request->id);
        $evenements->avecinscription = $request->avecinscription;
        $evenements->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function aveclimite(Request $request)
    {
        $evenements = Evenement::find($request->id);
        $evenements->aveclimite = $request->aveclimite;
        $evenements->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function etat(Request $request)
    {
        $evenements = Evenement::find($request->id);
        $evenements->etat = $request->etat;
        $evenements->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function etatinscription(Request $request)
    {
        $evenements = Evenement::find($request->id);
        $evenements->etatinscription = $request->etatinscription;
        $evenements->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function public(Request $request)
    {
        $evenements = Evenement::find($request->id);
        $evenements->public = $request->public;
        $evenements->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evenement $evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $evenements=Evenement::find($id);
        $evenements->delete();

        return redirect()->route('admin.evenements.index')
                        ->with('success',' evenements deleted successfully');
    }
    public function download($file_name) {
        $path = 'fichier\event/';
        $file_path = public_path($path. $file_name);
        return response()->download($file_path);
      }


}
