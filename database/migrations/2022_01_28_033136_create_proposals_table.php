<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')->constrained();
            $table->string('activityTitle');
            $table->string('actClassificationA');
            $table->string('actClassificationB');
            $table->string('description');
            $table->string('raationale');
            $table->string('outcome');
            $table->string('primaryAudience');
            $table->integer('numPrimaryAudience');
            $table->string('secondaryAudience')->nullable();
            $table->integer('numSecondaryAudience')->nullable();
            $table->foreignId('organizer');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
