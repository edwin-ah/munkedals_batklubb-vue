<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayClosed extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'startWeek',
        'endWeek'
    ];

    public $timestamps = false;
}
