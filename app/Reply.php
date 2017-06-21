<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reply extends Model
{
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }

    protected $guarded = [];
    public function owner()
    {
      return $this->belongsTo(User::class,'user_id');
    }
}
