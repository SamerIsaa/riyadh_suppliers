<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class BankAccountTranslation extends Model
{
    protected $fillable = ['bank_name'];
    public $timestamps = false;
}
