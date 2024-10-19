<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['invited', 'confirmed', 'refused'])->default('invited');
            $table->unsignedBigInteger('guest_id');
            $table->timestamps();

            $table->foreign('guest_id')->references('id')->on('guests');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
