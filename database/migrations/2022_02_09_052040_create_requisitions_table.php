<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained();
            $table->foreignId('proposal_id')->constrained();
            $table->string('type');
            $table->integer('controlNum');
            $table->date('created_at');
            $table->date('dateNeeded');
            $table->string('remarks');
            $table->string('chargedDepartment');
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
        Schema::dropIfExists('requisitions');
    }
}