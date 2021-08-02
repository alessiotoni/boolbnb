<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'object_email', 'content', 'email_sender', 'accomodation_id'
    ];

    public function accomodation () {
        return $this->belongsTo('App\Accomodation');
    }
}
 