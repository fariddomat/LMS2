<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhoIAmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('who_i_ams', function (Blueprint $table) {
            $table->id();
            $table->string('header')->default('0');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('title')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('who_i_ams');
    }
}
