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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::create('feature-groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estimate_id')->constrained();
            $table->string('name');
            $table->text('memo')->nullable();
            $table->timestamps();
        });
        Schema::create('feature_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_group_id')->constrained();
            $table->string('name');
            $table->text('memo')->nullable();
            $table->timestamps();
        });
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_category_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('estimated_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('estimates');
        Schema::dropIfExists('feature-groups');
        Schema::dropIfExists('feature_categories');
        Schema::dropIfExists('features');
    }
};
