<?php

namespace App\Models;
use App\Models\User;
use App\Models\Comment;


use App\Models\ForumLigne;
use App\Models\sousCategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'sujet',
        'enonce',
        'image',
        'public',
        'souscategorie_id',
        'user_id'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sousCategorie()
    {
        return $this->belongsTo(sousCategories::class);
    }
    // public function forumligne()
    // {
    //     return $this->hasMany(ForumLigne::class);
    // }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
