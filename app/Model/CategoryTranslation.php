<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
}
