<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    #=======================================================================================#
    #			                    To allow insert in table                              	#
    #=======================================================================================#
    protected $fillable = [
        'name',
        'manager_id',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function manager()
    {
        return $this->belongsTo(User::class);
    }
}
