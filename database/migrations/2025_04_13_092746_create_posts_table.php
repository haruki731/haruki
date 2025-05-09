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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title', 50)->nullable();
            $table->string('function',30);
            //$table->int('differential')->nullable();
            $table->float('start',5,4);
            $table->float('end',5,4);
            $table->float('response')->nullable();
            $table->string('body', 200)->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
