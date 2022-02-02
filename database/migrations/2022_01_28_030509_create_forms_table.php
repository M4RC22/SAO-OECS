<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId("createdBy");
            $table->string('formType');
            $table->string('orgName');
            $table->string('controlNumber');
            $table->string('eventTitle');
            $table->string('currApprover');
            $table->string('status');
            //Adviser
            $table->foreignId('adviserFacultyId')->nullable();
            $table->boolean('adviserIsApprove');
            $table->dateTime('adviserDateApproved', $precision= 0)->nullable();
            //SAO
            $table->foreignId('saoFacultyId')->nullable();
            $table->boolean('saoIsApprove');
            $table->dateTime('saoDateApproved', $precision= 0)->nullable();
            //Academic Services
            $table->foreignId('acadServFacultyId')->nullable();
            $table->boolean('acadServIsApprove');
            $table->dateTime('acadServDateApproved', $precision= 0)->nullable();
            //Finance
            $table->foreignId('financeStaffId')->nullable();
            $table->boolean('financeIsApprove');
            $table->dateTime('financeDateApproved', $precision= 0)->nullable();

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
        Schema::dropIfExists('forms');
    }
}
