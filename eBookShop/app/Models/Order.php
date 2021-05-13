<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'book_id',
        'user_id',
        'status'
    ];

    public function books(){
          return $this->belongsToMany('App\Models\Book','order_book', 'order_id', 'book_id');
     }

      public function user(){
          return $this->belongsTo('App\Models\User');
     }

}
