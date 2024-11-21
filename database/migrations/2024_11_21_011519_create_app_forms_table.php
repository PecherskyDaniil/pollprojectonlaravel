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
        Schema::create('app_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('favorite_food');
            $table->string('favorite_animal');
            $table->string('secret');
            $table->timestamps();
        });
        Schema::table('app_forms', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_forms');
        Schema::table('app_forms', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
    
};
