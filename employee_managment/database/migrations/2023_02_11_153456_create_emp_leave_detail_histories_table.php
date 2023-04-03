<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpLeaveDetailHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_leave_detail_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('emp_leave_detail_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('leave_type_id');
			$table->date('date_of_request');
            $table->date('leave_start_date');
            $table->date('leave_end_date');
            $table->string('no_of_days');
            $table->string('half_day_date');
            $table->date('return_date');
            $table->longText('leave_reason');
            $table->boolean('is_approved');
            $table->longText('remarks');
            $table->boolean('is_cancelled');
			$table->boolean('is_active')->default(1);
			$table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('emp_leave_detail_id')->references('id')->on('emp_leave_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_leave_detail_histories');
    }
}
