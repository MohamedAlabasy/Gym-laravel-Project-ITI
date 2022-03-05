<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cover_image',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}