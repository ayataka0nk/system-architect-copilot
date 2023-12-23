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
        Schema::table('feature_groups', function (Blueprint $table) {
            $table->integer('sequence')->after('estimate_id');
        });
        Schema::table('feature_categories', function (Blueprint $table) {
            $table->integer('sequence')->after('feature_group_id');
        });
        Schema::table('features', function (Blueprint $table) {
            $table->integer('sequence')->after('feature_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feature_groups', function (Blueprint $table) {
            $table->dropColumn('sequence');
        });
        Schema::table('feature_categories', function (Blueprint $table) {
            $table->dropColumn('sequence');
        });
        Schema::table('features', function (Blueprint $table) {
            $table->dropColumn('sequence');
        });
    }
};
