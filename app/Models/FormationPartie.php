<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormationPartie extends Model
{
    use HasFactory;
  protected $fillable = [
      'titre', 'video', 'description','rang','fichier','formation_id'
  ];
  public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
