<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'p_path',
        'p_name',
        'p_type',
        'company_id'
    ];

    /**
     * Get the picture associated with the user.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

        /**
     * Get the picture associated with the company.
     */
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}