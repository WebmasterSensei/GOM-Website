<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'desc',
        'image',
        'theme',
        'guest_speaker',
        'verse_chapter',
        'content',
        'church_name',
    
    ];
    protected $casts = [
        'image' => 'array',
    ];

      public function eventImage()
    {
        return $this->hasMany(Event::class);
    }
}
