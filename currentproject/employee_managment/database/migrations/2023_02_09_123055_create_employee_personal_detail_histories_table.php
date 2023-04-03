<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePersonalDetailHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_personal_detail_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('emp_personal_dtl_id');
            $table->unsignedBigInteger('user_id');
            $table->date('dob');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('image');
            $table->integer('mobile');
            $table->integer('alternate_no');
            $table->string('blood_group');
            $table->unsignedBigInteger('current_residence_type_id');
            $table->string('details_of_disability');
            $table->string('total_of_experience');

            $table->longText('current_address');
            $table->unsignedBigInteger('current_country_id');
            $table->unsignedBigInteger('current_state_id');
            $table->unsignedBigInteger('current_city_id');
            $table->string('current_pincode');

            $table->longText('permanent_address');
            $table->unsignedBigInteger('permanent_country_id');
            $table->unsignedBigInteger('permanent_state_id');
            $table->unsignedBigInteger('permanent_city_id');
            $table->string('permanent_pincode');

            $table->unsignedBigInteger('mode_of_transportation_id');
           
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();




            $table->foreign('emp_personal_dtl_id')->references('id')->on('employee_personal_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_personal_detail_histories');
    }
}
