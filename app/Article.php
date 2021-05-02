<?php

namespace App;

use Carbon\Carbon; //me
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];


    /*
    |----------------------------------------------------------------------------------------------------
    |mutator
    |----------------------------------------------------------------------------------------------------
    */
    public function getDatePublicationAttribute()
    {
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}