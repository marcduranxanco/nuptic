<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlienRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alien_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('internalId')->unique();
            $table->string('requestName');
            $table->integer('requestNumber');
            $table->string('direction');
            $table->integer('route');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alien_requests');
    }
}
