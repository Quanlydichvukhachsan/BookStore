<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'publication_date',
        'weight',
        'number_of_pages',
        'formality',
        'size',
        'foreign_book',
        'price',
        'original_Price',
        'percent_discount',
        'describe',
        'author_id',
        'publisher_id',
        'categories_id',
    ];

    public function author(){
        return $this->belongsTo('App\Models\Author');
    }
    public function publisher(){
        return $this->belongsTo('App\Models\Publisher');
    }
    public function categories(){
        return $this->belongsTo('App\Models\Category');
    }

    public function imagebooks(){
        return $this->hasMany('App\Models\ImageBook',foreignKey: 'book_id',localKey: 'id');
    }
}
