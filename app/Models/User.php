<?php

namespace App\Models;
use App\Models\Forum;
use App\Models\Gagnant;
use App\Models\Evenement;
use App\Models\Formation;
use App\Models\Forumligne;
use App\Models\Postulation;
use Laravel\Sanctum\HasApiTokens;
use App\Models\EvenementInscription;
use App\Models\FormationInscription;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [

    ];
    public function gagnant()
    {
        return $this->hasMany(Gagnant::class);
    }
    public function forum()
    {
        return $this->hasMany(Forum::class);
    }
    public function forumligne()
    {
        return $this->hasMany(Forumligne::class);
    }
    public function Formation()
    {
        return $this->hasMany(Formation::class);
    }
    public function postumation()
    {
        return $this->hasMany(Postulation::class);
    }
    public function evenement()
    {
        return $this->hasMany(Evenement::class);
    }
    public function inscription()
    {
        return $this->hasMany(EvenementInscription::class);
    }
    public function inscriptionormation()
    {
        return $this->hasMany(FormationInscription::class);
    }
    public function type()
    {
        return $this->belongsTo(AccountTypes::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
