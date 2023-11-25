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
        Schema::create('event', function (Blueprint $table) {
            $table->integer('id_event')->autoIncrement();
            $table->string('name_event', 50);
            $table->string('type_event', 20);
            $table->string("place_event", 50);
            $table->string("location_event", 100);
            $table->timestamp("start_event");
            $table->timestamp("end_event");
            $table->string("information_event")->nullable();
            $table->string("image_event")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
