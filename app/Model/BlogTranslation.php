<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $fillable = ['title', 'content'];
    public $timestamps = false;
}
