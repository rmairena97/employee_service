<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disabled_people', function (Blueprint $table) {
            $table->id();
            $table->integer('person_id');
            $table->foreign('person_id')->references('id')->on('people');
            $table->integer('disabled_id');
            $table->integer('disabled_level_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disabled_people');
    }
};
