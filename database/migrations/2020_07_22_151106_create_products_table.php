<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('title' );
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('extra_description');
            $table->string('image')->nullable();
            $table->float('price');
            $table->float('off')->nullable();
            $table->string('duration' , 32)->nullable();
            $table->string('coach', 255)->nullable();
            $table->year('year');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE')->onUpdate('CASCADE');
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
