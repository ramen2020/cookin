<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['content', 'user_id', 'name', 'place', 'price','img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
