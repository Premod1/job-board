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
        Schema::table('cg_jobs', function (Blueprint $table) {
            $table->foreignId('employer_id')
                  ->nullable()
                  ->constrained('employers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cg_jobs', function (Blueprint $table) {
            $table->dropForeign(['employer_id']); // Drop foreign key constraint
            $table->dropColumn('employer_id');
        });
    }
};
