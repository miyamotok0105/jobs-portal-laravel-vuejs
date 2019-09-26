<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');


            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');

            $table->string('title');
            $table->text('description');
            $table->text('qualifications');
            $table->string('expected_salary');
            $table->string('apply_email');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
