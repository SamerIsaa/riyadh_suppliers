<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

    protected $fillable = ['title', 'description'];
    public $timestamps = false;
}
