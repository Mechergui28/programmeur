<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class CommentController extends Controller
{
    public function store(Forum $forums,Request $request)
    {
        $request->validate([
            'content' => 'required|min:5'
        ]);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->evaluation = $request->input('evaluation', 'N/A');
        $comment->user_id = auth()->user()->id;
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $comment['image']= $filename;
        }
        // dd($comment->image);

        $forums->comments()->save($comment);
        return redirect()->back();
    }
    public function storeCommentReply(Comment $comment,Request $request)
    {
        $request->validate([
            'content' => 'required|min:5'
        ]);
        $commentReply = new Comment();
        $commentReply->content = $request->content;
        $commentReply->evaluation = $request->input('evaluation', 'N/A');
        $commentReply->user_id = auth()->user()->id;
        if($request->File('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save(public_path('public/'.$filename) );
            $commentReply['image']= $filename;
        }
        dd($commentReply->image);
        $comment->comments()->save($commentReply);

        return redirect()->back();
    }

    public function MarkAsSolution(Comment $comment,Request $request)
    {
        $comment->evaluation = $request->input('evaluation', 'oui');
        $comment->save();

        return redirect()->back();

    }

    public function ckeditor(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension= $request->file('upload')->getClientOriginalExtension();
            $fileName= $fileName . '_' . time() . '_' . $extension ;
            $request->file('upload')->move(public_path('media'),$fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName'=>$fileName,'uploaded' => 1, 'url' => $url]);
        }
    }

}
