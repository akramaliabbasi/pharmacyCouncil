<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
         	$table->string('qualification_level');
			$table->string('year_of_passing');
			$table->string('name_of_institute');
			$table->string('board_university');
			$table->string('certificate_image');
			$table->engine = 'InnoDB';
			$table->charset = 'utf8';
			$table->collation = 'utf8_unicode_ci';
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
        Schema::dropIfExists('qualification_informations');
    }
}
