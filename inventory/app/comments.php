<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    protected $fillable=[
        'contacts_id',
        'text',
        'star'
    ];

    public function Contact()
    {
        return $this->belongTo('App\Contact');
    }

}
