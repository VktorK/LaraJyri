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
        Schema::create('executors', function (Blueprint $table) {
            $table->id();
            $table->string('Last_name');
            $table->string('First_name');
            $table->string('Middle_name');
            $table->string('Phone');
            $table->string('Specialization');
            $table->integer('experience');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executors');
    }
};
