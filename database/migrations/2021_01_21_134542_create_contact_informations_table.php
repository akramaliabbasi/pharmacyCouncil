<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['Permanent', 'Mailing']);
			$table->string('address');
			$table->string('country');
			$table->string('city');
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
        Schema::dropIfExists('contact_informations');
    }
}
