<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpWorkExperienceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_work_experience_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
			$table->string('name',255);
            $table->longText('address');
            $table->date('date_of_joining');
            $table->date('date_of_leaving');
            $table->string('joining_designation',255);
            $table->string('leaving_designation',255);
            $table->string('role',255);
            $table->string('last_salary',255);
            $table->longText('leaving_reason');
            $table->string('reporting_authority_name',255);
            $table->string('reporting_authority_contact');
            $table->string('reporting_authority_designation',255);
            $table->string('experience_certificate',255);
			$table->boolean('is_active')->default(1);
			$table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_work_experience_details');
    }
}
