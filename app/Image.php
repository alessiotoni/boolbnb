<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url_img', 'alt', 'accomodation_id'
    ]; 
    public function accomodation() {
        return $this->belongsTo('App\Accomodation');
    }
}
