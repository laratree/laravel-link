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
        Schema::create( config('laravel-link.table', 'links'), function (Blueprint $table) {
            $table->id();
            $table->string('linkable_type');
            $table->unsignedBigInteger('linkable_id');
            $table->string('url', 255)->unique();
            $table->timestamps();

            $table->unique(['linkable_id', 'linkable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('laravel-link.table', 'links'));
    }
};
