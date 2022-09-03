<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radio_time_tables', function (Blueprint $table) {
            $table->id();
            $table->time('starttime')->nullable();
            $table->time('endtime')->nullable();
            $table->text('days')->nullable();
            $table->date('playdate')->nullable();
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
        Schema::dropIfExists('radio_time_tables');
    }
};
