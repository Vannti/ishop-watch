<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->string('alias')->unique();
            $table->text('content')->default(null)->nullable();
            $table->float('price')->default(0);
            $table->float('old_price')->default(0);
            $table->enum('status', [0,1])->default(1);
            $table->string('keywords')->default(null)->nullable();
            $table->string('description')->default(null)->nullable();
            $table->string('img')->default('no_image.jpg');
            $table->enum('hit', [0,1])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
