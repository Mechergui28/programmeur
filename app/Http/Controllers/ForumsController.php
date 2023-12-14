<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Categories;
use App\Models\ForumLigne;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Intervention\Image\ImageManagerStatic as Image;


class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::all();
        $users = User::all();
        $categories = Categories::all();
        return view('admin.forums.index',compact('forums','users','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $forums= Forum::with('user')->get();
        $categories = Categories::all();
        $users= User::all();
        return view('admin.forums.create',compact('forums','users','categories'));
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
            'sujet' => 'required',
            'enonce' => 'required',

        ]);

        $forum = new Forum();
        $forum->sujet = $request->sujet;
        $forum->enonce = $request->enonce;
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $forum['image']= $filename;
        }
        $forum->public = $request->public;

        $forum->user_id = $request->user_id;
        $forum->categorie_id = $request->categorie_id;
        $forum->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forums,$id)
    {
        $forums = Forum::with('comments')->first();
        return view('admin.forums.show',compact('forums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $forums= Forum::find($id);
        $categories = Categories::all();
        $users= User::all();
        return view('admin.forums.edit',compact('forums','users','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forums=Forum::find($id);
        $forums->sujet=$request['sujet'];
        $forums->enonce=$request['enonce'];
        if($request->file('image')){
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $forums['image']= $filename;
        }
        $forums->public=$request['public'];
        $forums->categorie_id=$request['categorie_id'];
        $forums->save();
        return redirect()->route('showallforum');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $forums=Forum::find($id);
        $forums->delete();

        return redirect()->route('showallforum');
    }
    public function changepublic(Request $request)
    {
        $forums = Forum::find($request->id);
        $forums->public = $request->public;
        $forums->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
