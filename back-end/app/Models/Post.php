<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Illuminate\Database\Eloquent\Model;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;
    // protected $table = 'posts';
    protected $fillable = [
        'post_id',
        'post_image',
        'post_title',
        'post_description'
    ];
    public $timestamps = false;
}
