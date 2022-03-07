<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingSession extends Model
{
    use HasFactory;
    use SoftDeletes;
    #=======================================================================================#
    #			                    To allow insert in table                              	#
    #=======================================================================================#
    protected $fillable = [
        'name',
        'day',
        'starts_at',
        'finishes_at',
        'training_package_id',
    ];

    public function trainingPackage()
    {
        return $this->belongsTo(TrainingPackage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
