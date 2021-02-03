<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('title', ['Mr.', 'Mrs.','Miss','Ms.','Dr.']);
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('father_name');
			$table->string('occupation');
			$table->enum('marital_status', ['Married','Single','Separated/Divorced','Widowed']);
			$table->enum('gender', ['Female','Male','Other']);
			$table->string('date_of_birth');
			$table->string('domicile');
			$table->string('country_of_birth');
			$table->enum('religion', ['Muslim','Non-Muslim']);
			$table->enum('permission', ['Approved','Approval Pending','Verification Pending','Issued']);
			$table->string('profile_image');
			$table->longText('comments');
			$table->string('degree_calculation_status')->default(false);
			$table->boolean('status')->default(false);
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
        Schema::dropIfExists('applicants');
    }
}
