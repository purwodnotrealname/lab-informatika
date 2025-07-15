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
            $table->unsignedBigInteger('price')->default(0);
            $table->string('video_link')->nullable();
            $table->string('demo_link')->nullable();
            $table->string('source_code')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_accepted')->default(0);
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
