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
            $table->unsignedBigInteger('trainer_id');
            $table->string('title' );
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('extra_description')->nullable();
            $table->string('image')->nullable();
            $table->string('demo')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('off')->nullable();
            $table->time('duration')->nullable();
            $table->year('year');
            $table->unsignedBigInteger('views')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('CASCADE')->onUpdate('CASCADE');
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
