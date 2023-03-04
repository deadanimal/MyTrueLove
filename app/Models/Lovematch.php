<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lovematch extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'status',

        'user_id',     
    ];        
}
