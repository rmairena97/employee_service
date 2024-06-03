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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('cui', 50)->nullable()->unique()->index();
            $table->string('passport', 50)->nullable()->unique();
            $table->string('nit', 20)->nullable()->unique();
            $table->string('f_name', 50)->nullable();
            $table->string('s_name', 50)->nullable();
            $table->string('other_name', 250)->nullable();
            $table->string('f_surname', 50)->nullable();
            $table->string('l_surname', 50)->nullable();
            $table->string('house_surname', 50)->nullable();
            $table->string('igss', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('children_count')->nullable();
            $table->integer('marital_state');
            $table->integer('gender_id');
            $table->integer('linguistic_community_id');
            $table->integer('ethnicity_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
