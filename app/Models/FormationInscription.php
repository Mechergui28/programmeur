<?php

namespace App\Models;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationInscription extends Model
{
    use HasFactory;
    protected $fillable = ['etat'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}

