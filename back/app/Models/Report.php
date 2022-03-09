<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * Get the Company that owns the template.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the Company that owns the template.
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
