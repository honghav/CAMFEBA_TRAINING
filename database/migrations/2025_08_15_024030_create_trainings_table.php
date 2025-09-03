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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cover')->nullable();
            $table->text('detail');
            $table->string('price')->nullable();
            $table->string('member_price')->nullable();
            $table->string('location')->nullable();
            $table->string('prepare_by');
            $table->text('drive_link')->nullable();
            $table->foreignId('category_id')->constrained('category_trainings')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
