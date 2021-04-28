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
        'number of pages',
        'formality',
        'size',
        'foreign_book',
        'price',
        'price_discount',
        'percent_discount',
    ];

    public function author(){
        return $this->belongsTo('App\Models\Author');
    }
    public function publisher(){
        return $this->belongsTo('App\Model\Publisher');
    }
}
