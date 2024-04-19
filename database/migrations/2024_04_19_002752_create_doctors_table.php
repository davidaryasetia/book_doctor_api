<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // doctors table refers to user table
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('doc_id')->unique();
            $table->string('category')->nullable();
            $table->unsignedBigInteger('patients')->nullable();
            $table->unsignedBigInteger('experience')->nullable();
            $table->longText('bio_data')->nullable();
            $table->string('status')->nullable();
            // state doc_id refers to user_table
            $table->foreign('doc_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('doctors');
    }
};
