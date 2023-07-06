<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [ 'title' , 'description'];
    public $timestamps = false;
}
