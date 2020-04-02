<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->string('email');
            $table->string('informacion');
            $table->string('position');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('experience');
            $table->string('education');
            $table->string('skills');
            $table->string('knowledge');
            $table->string('projects');
            $table->string('hobbies');
            $table->string('contributions');
            $table->bigInteger('phone');
            $table->string('city');
            $table->string('website');
            $table->string('github');
            $table->string('lenguaje');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('street');
            $table->string('perfil_photo');
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
        Schema::dropIfExists('user_information');
    }
}
