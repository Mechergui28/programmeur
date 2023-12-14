<?php

namespace App\Models;
use App\Models\Categories;
use App\Models\forum;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 
        'categorie_id'  
    ];
    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }
    public function forum()
    {
        return $this->belongsTo(forums::class);
    }
}
