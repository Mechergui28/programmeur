<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Comment;
use App\Models\Annonce;
use App\Models\Evenement;
use App\Models\Formation;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\FormationPartie;
use App\Models\FormationInscription;

class FrontController extends Controller
{
    public function index()
    {
        $events = Evenement::latest()->take(3)->get();
        $event = Evenement::all();
        $formation = Formation::latest()->take(3)->get();
        $formations = Formation::all();
        $annonce = Annonce::latest()->take(3)->get();
        $annonces = Annonce::all();
        $user = User::all();
        return view('welcome',compact('events','formation','annonce','user','event','formations','annonces'));
    }
    public function showevent($id)
    {
        // $event=Evenement::with('inscription','user')->where('id', $id)->get();
        $events = Evenement::with('inscription','user')->where('id', $id)->first();
        // dd($event);
        return view('showevent',compact('events'));
    }

    public function showformation($id)
    {
        $formation = Formation::with('formationpartie')->where('id', $id)->first();
        $formationinscription = FormationInscription::where('formation_id',$formation->id)->first();
        return view('showformation',compact('formation','formationinscription'));
    }
    public function showannonce($id)
    {
        $annonce = Annonce::with('TypeAnnonce')->where('id', $id)->first();
        $user=User::all();
        return view('showannonce',compact('annonce','user'));
    }

    public function showallformation()
    {
        $formations = Formation::latest()->paginate(3);
        return view('showallformation',compact('formations'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function showallevent()
    {
        $events = Evenement::latest()->paginate(3);
        return view('showallevent',compact('events'));
    }
    public function showallannonce()
    {
        $annonces = Annonce::latest()->paginate(4);
        return view('showallannonce',compact('annonces'));
    }
    public function showformationpartie($id)
    {
        $formationpartie = FormationPartie::with('formation')->where('id', $id)->first();
        return view('showformationpartie',compact('formationpartie'));
    }
    public function showallforum()
    {
        $forums = Forum::with('user')->withCount('comments')->paginate(6);
        $categories = Categories::all();
       $comment= Forum::withCount('comments');
        return view('showallforum',compact('forums','categories','comment'));
    }
    public function showforum($id)
    {
       $forums = Forum::with('comments')->where('id', $id)->first();
        return view('showforum',compact('forums'));
    }

}
