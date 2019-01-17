<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['title','content','slug','status','user_id'];

    protected $foreignkey = 'user_id';
}

