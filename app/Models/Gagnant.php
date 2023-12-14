<?php

namespace App\Models;
use App\Models\User;
use App\Models\Evenement;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gagnant extends Model
{
    use HasFactory;
    protected $fillable = [
        'rang',
        'prix'  ,
        'evenement_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
