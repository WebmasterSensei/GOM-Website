<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyVerse extends Model
{
    use HasFactory;

    protected $fillable = [
        'verse',
        'words'
    ];

    protected $table = 'dverses';
}
