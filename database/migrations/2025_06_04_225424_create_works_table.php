<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tag_id')->nullable(); 
            $table->string('credit')->nullable();
            $table->string('source')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('works');
    }
}
