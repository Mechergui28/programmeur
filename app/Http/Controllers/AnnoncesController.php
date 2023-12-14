<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\TypeAnnonce;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;



class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::with('typeannonce','user')->get();
        // dd($annonces);
        return view('admin.annonces.index',compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeannonces= TypeAnnonce::all();
        $user= User::all();
        return view('admin.annonces.create',compact('typeannonces','user'));
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
            'annonce' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $annonce = new Annonce();
        $annonce->annonce = $request->annonce;
        $annonce->specification = $request->specification;
        if($request->file('fichier')){
            $file= $request->file('fichier');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('fichier'), $filename);
            $annonce['fichier']= $filename;
        }
        // $annonce->fichier = $request->fichier;
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $annonce['image']= $filename;

        }
        $annonce->titre = $request->titre;
        $annonce->public = $request->public;
        $annonce->type = $request->type;
        $annonce->user_id = $request->user_id;
        $annonce->type_annonce = $request->type_annonce;
// dd($annonce);
        $annonce->save();
        // Annonce::create($request->all());
        return redirect()->route('admin.annonces.index')
                        ->with('success',' Annonce created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonces)
    {
        return view('admin.annonces.show',compact('annonces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $annonces= Annonce::find($id);
        $typeannonces= TypeAnnonce::all();
        $users= User::all();
        return view('admin.annonces.edit',compact('typeannonces','annonces','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request,[
            'annonce' => 'required',
            'specification' => 'required',
            'titre' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $annonces= Annonce::find($id);
        $annonces->annonce=$request['annonce'];
        $annonces->specification=$request['specification'];
        $annonces->fichier=$request['fichier'];
        $annonces->titre=$request['titre'];
        $annonces->public=$request['public'];
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $annonces['image']= $filename;
        }
        $annonces->save();
        return redirect()->route('admin.annonces.index')
                        ->with('success','annonce updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $annonces=Annonce::find($id);
        $annonces->delete();

        return redirect()->route('admin.annonces.index')
                        ->with('success',' annonce deleted successfully');
    }

    public function changepublic(Request $request)
    {
        $annonces = Annonce::find($request->id);
        $annonces->public = $request->public;
        $annonces->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function changetype(Request $request)
    {
        $annonces = Annonce::find($request->id);
        $annonces->type = $request->type;
        $annonces->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function download($file_name) {
        $file_path = public_path('fichier/'.$file_name);
        return response()->download($file_path);
      }
}


