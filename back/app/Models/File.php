<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'user_id',
        'zone_code',
        'score_skinbiosense',
        'session_id',
        'mesure',
    ];
}