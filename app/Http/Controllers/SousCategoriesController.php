<?php

namespace App\Http\Controllers;

use App\Models\SousCategorie;
use App\Models\Categories;

use Illuminate\Http\Request;

class SousCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $souscategories = SousCategorie::with('categorie')->get();
        return view('admin.souscategories.index',compact('souscategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Categories::all();
        return view('admin.souscategories.create',compact('categories'));
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
            'nom' => 'required'
        ]);
    
        SousCategorie::create($request->all());
     
        return redirect()->route('admin.souscategories.index')
                        ->with('success',' Sous categories created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousCategorie  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(SousCategorie $categories)
    {
        return view('admin.souscategories.show',compact('souscategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousCategorie  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $souscategories= SousCategorie::find($id);
        $categories= Categories::all();
        return view('admin.souscategories.edit',compact('souscategories','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SousCategorie $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $categories=SousCategorie::find($id);
        $categories->nom=$request['nom'];
        $categories->update();
        return redirect()->route('admin.souscategories.index')
                        ->with('success','Sous Categories updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousCategorie  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $categories=SousCategorie::find($id);
        $categories->delete();
    
        return redirect()->route('admin.souscategories.index')
                        ->with('success',' Sous Categories deleted successfully');
    }
}

