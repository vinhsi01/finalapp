<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Illuminate\Database\Eloquent\Model;
class Album extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = [
        'album_image',
        'album_title',
        'album_description'
    ];
    public $timestamps = false;
}
