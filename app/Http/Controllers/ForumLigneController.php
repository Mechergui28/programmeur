<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumLigne;
use App\Models\User;
use Illuminate\Http\Request;
class ForumLigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forumlignes = ForumLigne::with('forumligne')->get();
        return view('admin.forumslignes.index',compact('forumlignes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $forumsligne= forumligne::all();
        $forums= forum::all();
        $users= User::all();
        return view('admin.forumslignes.create',compact('forums','users','forumsligne'));
    }

    /**
     * storecomment a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecomment(Request $request , Forum $forum)
    {
        $request->validate([
            'enonce' => 'required',
            'image' => 'required',
            'evaluation' => 'required',

        ]);
    
        $forumligne = new ForumLigne();
        $forumligne->enonce = $request->enonce;
        $forumligne->evaluation = $request->evaluation;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $forumligne['image']= $filename;
        }
        $forumligne->user_id = auth()->user()->id;
        $forum->comments()->save($forumligne);
        $forumligne->save();

        return redirect()->route('admin.forums.index')
                        ->with('success',' Forum lignes created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumLigne  $forumligne
     * @return \Illuminate\Http\Response
     */
    public function show(Forumligne $forumligne)
    {
          return view('admin.Forumslignes.show',compact('Forumslignes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forumligne  $forumligne
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $forumsligne= ForumLigne::find($id);
        $Users= User::all();
        $forum= Forum::all();
        return view('admin.forumsligne.edit',compact('forumslignes','forums','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumLigne  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $forums=forum::find($id);
        $forums->enonce=$request['enonce'];
        $forums->photo=$request['photo'];
        $forums->public=$request['evaluation'];
        $forums->update();
        return redirect()->route('admin.forumslignes.index')
                        ->with('success','Forums lignes updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forumligne  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $forumsligne=Forumligne::find($id);
        $forumsligne->delete();

        return redirect()->route('admin.forumslignes.index')
                        ->with('success',' Forums  ligne deleted successfully');
    }

}
