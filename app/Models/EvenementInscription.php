<?php

namespace App\Models;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EvenementInscription extends Model
{
    use HasFactory;
    protected $fillable = ['etat','user_id'];


    public function evenement()
    {
        return $this->belongsTo(Evenement::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
