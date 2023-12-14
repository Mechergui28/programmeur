<?php

namespace App\Models;
use App\Models\Evenement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerie extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'titre',
        'description',
        'rang',
        'evenement_id'
    ];
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
