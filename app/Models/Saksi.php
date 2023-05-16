<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'saksi';
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
