<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProposalsExternalCoorganizersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_coorganizer_proposal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('external_coorganizer_id')->constrained();
            $table->foreignId('proposal_id')->constrained();
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
        Schema::dropIfExists('external_coorganizers_proposals');
    }
}
