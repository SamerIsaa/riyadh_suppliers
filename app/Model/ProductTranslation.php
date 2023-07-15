<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

    protected $fillable = ['title', 'short_description', 'description'];
    public $timestamps = false;
}
