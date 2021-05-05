<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'city',
        'country',
        'job_title'

    ];

    public function comments(){
        return $this->hasMany('App\Contact');
            }
    public function set_best_comment($comment){
        $this->best_comment_id=$comment->id;
        return $this->save();
    }
}
