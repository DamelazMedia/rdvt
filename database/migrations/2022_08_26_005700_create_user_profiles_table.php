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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('dj_name');
            $table->string('slug');
            $table->binary('avatar_img')->nullable();
            $table->text('avatar_slug')->nullable();
            $table->binary('cover_img')->nullable();
            $table->text('cover_slug')->nullable();
            $table->text('bio')->nullable();
            $table->text('genries')->nullable();
            $table->text('intrests')->nullable();
            $table->date('birthday')->nullable();
            $table->string('city')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
};
