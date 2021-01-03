<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Astro extends Model
{
    protected $fillable = [
        'date',
        'name',
        'overall_score',
        'overall_description',
        'romance_score',
        'romance_description',
        'career_score',
        'career_description',
        'wealth_score',
        'wealth_description',
    ];

    public $timestamps = false;

    protected $dateFormat = 'Y-m-d';
}
