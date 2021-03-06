<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fellings', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_trees');
            $table->unsignedBigInteger('site');
            $table->text('photo')->nullable();
            $table->unsignedBigInteger('captured_by');
            $table->timestamps();
            
            $table->foreign('site')->references('id')->on('sites');
            $table->foreign('captured_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fellings');
    }
}