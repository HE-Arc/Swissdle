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
        Schema::table('langues_villes', function (Blueprint $table) {

            $table->foreignId('langue_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ville_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('langues_villes', function (Blueprint $table) {

            $table->dropForeign(['langue_id']);
            $table->dropColumn('langue_id');

            $table->dropForeign(['ville_id']);
            $table->dropColumn('ville_id');
        });
    }
};
