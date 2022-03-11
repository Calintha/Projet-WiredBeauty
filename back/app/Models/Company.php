<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Get all technician that owns the user.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the Picture that owns the Company.
     */
    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    /**
     * Get all technician that owns the user.
     */
    public function template()
    {
        return $this->hasMany(Template::class);
    }
}
