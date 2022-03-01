<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingPackage extends Model
{
    use HasFactory;
    use SoftDeletes;
    #=======================================================================================#
    #			                    To allow insert in table                              	#
    #=======================================================================================#
    protected $fillable = [];
}