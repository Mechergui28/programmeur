<?php

namespace App\Models;
use App\Models\User;
use App\Models\FormationPartie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',  'description',  'motcle',  'image',  'public',
        'etat', 'avecinscription','etatinscription',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function formationpartie()
    {
        return $this->hasMany(FormationPartie::class);
    }
}
