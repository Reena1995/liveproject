<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_personal_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('fathername',255);
            $table->string('mothername',255);
            $table->date('dob');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('image');
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


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('current_residence_type_id')->references('id')->on('current_residence_types');
            $table->foreign('mode_of_transportation_id')->references('id')->on('mode_of_transportations');
           
            $table->foreign('current_country_id')->references('id')->on('countries');
            $table->foreign('current_state_id')->references('id')->on('states');
            $table->foreign('current_city_id')->references('id')->on('cities');

            $table->foreign('permanent_country_id')->references('id')->on('countries');
            $table->foreign('permanent_state_id')->references('id')->on('states');
            $table->foreign('permanent_city_id')->references('id')->on('cities');

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
        Schema::dropIfExists('employee_personal_details');
    }
}
