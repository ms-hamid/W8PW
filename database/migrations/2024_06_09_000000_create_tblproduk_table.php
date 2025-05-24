<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblprodukTable extends Migration
{
    public function up()
    {
        Schema::create('tblproduk', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Product name
            $table->text('description'); // Product description
            $table->integer('price'); // Product price
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblproduk');
    }
}