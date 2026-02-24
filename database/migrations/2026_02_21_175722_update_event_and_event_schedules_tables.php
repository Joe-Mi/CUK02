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
            $table->string('status')->default('active');
        });

        Schema::table('event_schedules', function (Blueprint $table) {
            $table->renameColumn('venue', 'location');
            $table->string('status')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('event_schedules', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->renameColumn('location', 'venue');
        });
    }
};
