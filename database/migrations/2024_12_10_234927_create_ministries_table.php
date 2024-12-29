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
        // Tabel ministries
        Schema::create('ministries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('meeting_time')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['open', 'closed']);
            $table->integer('total_slots')->default(0);
            $table->timestamps();
        });

        // Tabel pivot ministry_user
        Schema::create('ministry_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ministry_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('portfolio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel pivot terlebih dahulu untuk menghindari masalah foreign key
        Schema::dropIfExists('ministry_user');

        // Hapus tabel ministries
        Schema::dropIfExists('ministries');
    }
};
