<?php

namespace App\Models;
use App\Models\TypeAnnonce;
use App\Models\Annonce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAnnonce extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
    ];
    public function annonce()
    {
        return $this->hasMany(Annonce::class,'id','type_annonce');
    }

}
