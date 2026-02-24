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
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->renameColumn('location', 'venue');
            $table->integer('duration')->nullable();
            $table->integer('capacity')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->dropColumn(['type', 'event_start', 'event_end']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
};
