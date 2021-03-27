<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price',8,3,true);
            $table->decimal('priceDiscount',8,3,true)->nullable();
            $table->integer('numOfPages');
            $table->integer('weight');
            $table->float('heightSize');
            $table->float('widthSize');
            $table->string('formality');
            $table->integer('publishingYear');
            $table->integer('categories_id');
            $table->integer('author_id');
            $table->integer('publisher_id');
            $table->integer('sale')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
