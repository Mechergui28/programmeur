<?php

namespace App\Models;

use App\Models\User;
use App\Models\Forum;
use App\Models\ForumLigne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumLigne extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'enonce',
        'image',
        'evaluation',
        'forum_id'  ,
        'user_id',
        'commentable_id',
        'commentable_type',
    ];
    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }
    public function comments()
    {
        return $this->morphMany(ForumLigne::class, 'commentable');
    }





}
