<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;




class User extends Authenticatable implements BannableContract, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;
    use Bannable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    #=======================================================================================#
    #			                    To allow insert in table                              	#
    #=======================================================================================#
    protected $fillable = [
        'name',
        'email',
        'is_verifications',
        'national_id',
        'password',
        'gender',
        'profile_image',
        'birth_date',
        'total_sessions',
        'remain_session',
        'last_login_at',
        'city_id',
        'gym_id',
        'updated_at',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
    public function TrainingSessions()
    {
        return $this->belongsToMany(TrainingSession::class);
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

    public function getProfileImageFileAttribute()
    {
        if ($this->attributes['profile_image']) {
            return $this->attributes['profile_image'];
        } else {
            return 'avatar.png';
        }
    }


}