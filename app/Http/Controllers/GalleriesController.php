<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallerie;
use App\Models\Evenement;


class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallerie::with('evenement')->get();
        return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries= gallerie::all();
        $evenements= Evenement::all();
        return view('admin.galleries.create',compact('galleries','evenements'));
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
            'rang' => 'required',
        ]);

        $gallerie = new Gallerie();
        $gallerie->titre = $request->titre;
        $gallerie->description = $request->description;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $gallerie['image']= $filename;
        }
        $gallerie->rang = $request->rang;
        $gallerie->evenement_id = $request->evenement_id;
        $gallerie->save();
        return redirect()->route('admin.galleries.index')
                        ->with('success',' galleries created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallerie  $galleries
     * @return \Illuminate\Http\Response
     */
    public function show(Gallerie $galleries)
    {
        return view('admin.galleries.show',compact('galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallerie  $galleries
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $galleries= Gallerie::find($id);
        $evenements= Evenement::all();
        return view('admin.galleries.edit',compact('galleries','evenements'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallerie $galleries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $galleries=Gallerie::find($id);
        $galleries->titre = $request->titre;
        $galleries->description = $request->description;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $galleries['image']= $filename;
        }
        $galleries->rang = $request->rang;
        $galleries->evenement_id = $request->evenement_id;
        $galleries->save();
        return redirect()->route('admin.galleries.index')
                        ->with('success','galleries updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallerie  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $galleries=Gallerie::find($id);
        $galleries->delete();

        return redirect()->route('admin.galleries.index')
                        ->with('success',' galleries deleted successfully');
    }
}

