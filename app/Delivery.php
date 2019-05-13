<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['content', 'user_id', 'name', 'place', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
