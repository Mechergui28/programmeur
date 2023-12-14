<?php

namespace App\Models;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Postulation;
use App\Models\TypeAnnonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'annonce ',
        'specification ',
        'fichier ',
        'image',
        'titre ',
        'public ',
        'type ',
        'type_annonce ',
        'user_id ',
    ];
    public function typeannonce()
    {
        return $this->belongsTo(TypeAnnonce::class,'type_annonce','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function postulation()
    {
        return $this->hasMany(Postulation::class);
    }


}
