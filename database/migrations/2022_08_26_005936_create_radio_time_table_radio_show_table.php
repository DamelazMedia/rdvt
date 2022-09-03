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
        Schema::create('radio_time_table_radio_show', function (Blueprint $table) {
            $table->id();
            $table->foreignId('radio_time_table_id')->constrained('radio_time_tables')->onUpdate('cascade')->onDelete('cascade')->nullable();
			$table->foreignId('radio_show_id')->constrained('radio_shows')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('radio_time_table_radio_show');
    }
};
