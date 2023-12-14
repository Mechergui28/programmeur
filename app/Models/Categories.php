<?php

namespace App\Models;
use App\Models\SousCategorie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 
    ];
    public function souscategorie()
    {
        return $this->hasMany(SousCategorie::class);
    }
}
