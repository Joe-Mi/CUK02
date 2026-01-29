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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('location', 255);
            $table->string('type', 255);
            $table->dateTime('event_start')->nullable();
            $table->dateTime('event_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};



/*
     \DB::table('events')->insert([
         'name' => 'AI confrence 2026',
         'location' => 'cooprative university',
         'type' => 'hybrid',
         'event_start' => '2026-01-28 10:27:00',
         'event_end' => '2026-01-28 15:27:00',
         'created_at' => now(),
         'updated_at' => now()
     ]);
 */