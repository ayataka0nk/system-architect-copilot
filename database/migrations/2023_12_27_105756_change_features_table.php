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
        Schema::table('features', function (Blueprint $table) {
            $table->float('estimated_hours')->nullable()->change();
            $table->float('proposed_estimated_hours')->nullable()->change();
            $table->text('estimated_hours_reason')->nullable();
            $table->text('proposed_estimated_hours_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('features', function (Blueprint $table) {
            $table->integer('estimated_hours')->nullable()->change();
            $table->integer('proposed_estimated_hours')->nullable()->change();
            $table->dropColumn('estimated_hours_reason');
            $table->dropColumn('proposed_estimated_hours_reason');
        });
    }
};
