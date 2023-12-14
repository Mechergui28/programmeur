<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Evenement;
use App\Models\Formation;

class IndexController extends Controller
{
    public function index(){
        $events = Evenement::count();
        $formation = Formation::count();
        $annonce = Annonce::count();
        $user = User::count();
        return view('admin.index',compact('events','formation','annonce','user'));
    }
}
