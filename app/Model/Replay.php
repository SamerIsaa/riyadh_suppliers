<?php

namespace App\Model;

use App\Model\Contact;
use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{

    protected $fillable = ['contact_id' , 'message'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
