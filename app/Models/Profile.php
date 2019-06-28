<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable=['name', 'email', 'designation', 'experience', 'photo', 'publication_status'];



}
