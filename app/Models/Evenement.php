<?php

namespace App\Models;
use App\Models\User;
use App\Models\gagnant;
use App\Models\EvenementInscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'enonce',
        'fichier',
        'image',
        'datedebut',
        'datefin',
        'limite',
        'aveclimite',
        'etatisncription',
        'avecisncription',
        'public',
        'type',
        'programme',
        'comite',
        'motcle',
        'fichier',
        'user_id'

    ];

    public function gagnant()
    {
        return $this->hasMany(gagnant::class);
    }
    public function inscription()
    {
        return $this->hasMany(EvenementInscription::class,'evenement_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
