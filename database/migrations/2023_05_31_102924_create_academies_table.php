<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->text('ar_title')->nullable();
            $table->text('en_title')->nullable();
            $table->text('header')->nullable();
            $table->longText('about')->nullable();
            ;
            $table->longText('who_are_we')->nullable();
            $table->longText('history')->nullable();
            $table->longText('phylosofy')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('message')->nullable();

            $table->longText('content')->nullable();
            $table->longText('how_is')->nullable();

            $table->longText('goals')->nullable();
            $table->longText('essential')->nullable();
            $table->longText('education_way')->nullable();
            $table->longText('education_period')->nullable();
            $table->longText('graduation_condition')->nullable();
            $table->longText('accept_condition')->nullable();
            $table->longText('education_fee')->nullable();

            $table->longText('footer')->nullable();



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
        Schema::dropIfExists('academies');
    }
}
