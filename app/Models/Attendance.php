<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

    #=======================================================================================#
    #			                    To allow insert in table                              	#
    #=======================================================================================#
    protected $fillable = [
        'attendance_at',
        'user_id',
        'training_session_id',
    ];

    public function user() //name is very important
    {
        return $this->belongsTo(User::class);
    }

    public function trainingSession() //name is very important
    {
        return $this->belongsTo(TrainingSession::class);
    }
}
