<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            // $table->string('type'); // student - worker - doctor
            $table->longText('about')->nullable();
            $table->longText('why')->nullable();
            $table->string('status')->default('active');
            // $table->rememberToken();

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
        Schema::dropIfExists('profiles');
    }
}
