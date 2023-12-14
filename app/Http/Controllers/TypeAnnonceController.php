<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeAnnonce;


class TypeAnnonceController extends Controller
{

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $typeannonces = typeannonce::latest()->paginate(5);

            return view('admin.typeAnnonce.index',compact('typeannonces'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {

            return view('admin.typeAnnonce.create');
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
                'nom' => 'required',
                'description' => 'required'
            ]);

            typeAnnonce::create($request->all());

            return redirect()->route('admin.typeAnnonce.index')
                            ->with('success','type annonce created successfully.');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\TypeAnnonce  $typeannnce
         * @return \Illuminate\Http\Response
         */
        public function show(TypeAnnonce $TypeAnnonce)
        {
            return view('admin.typeAnnonce.show',compact('typeannonce'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\TypeAnnonce  $typeannonce
         * @return \Illuminate\Http\Response
         */
        public function edit(Request $request, $id)
        {

            $typeannonces=TypeAnnonce::find($id);
            return view('admin.typeAnnonce.edit',compact('typeannonces'));

        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\TypeAnnonce  $typeannonce
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {

            $typeannonces=TypeAnnonce::find($id);
            $typeannonces->nom=$request['nom'];
            $typeannonces->description=$request['description'];

            $typeannonces->update();
            return redirect()->route('admin.typeAnnonce.index')
                            ->with('success','type annonce updated successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\TypeAnnonce  $typeannonce
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request,$id)
        {
            $typeannonces=TypeAnnonce::find($id);
            $typeannonces->delete();

            return redirect()->route('admin.typeAnnonce.index')
                            ->with('success','type annonce deleted successfully');
        }
    }



