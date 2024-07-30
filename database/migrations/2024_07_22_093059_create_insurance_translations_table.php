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
        Schema::create('insurance_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('Insurance_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('note');
            $table->unique(['Insurance_id', 'locale']);
            $table->foreign('Insurance_id')->references('id')->on('insurances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_translations');
    }
};
