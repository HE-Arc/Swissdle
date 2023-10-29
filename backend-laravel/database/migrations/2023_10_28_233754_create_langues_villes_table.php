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
        Schema::create('langues_villes', function (Blueprint $table) {

            $table->unsignedBigInteger('langue_id');
            $table->unsignedBigInteger('ville_id');

            $table->primary(['langue_id', 'ville_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langues_villes');
    }
};
