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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('Last_name')->nullable();
            $table->string('First_name')->nullable();
            $table->string('Middle_name')->nullable();

            $table->date('date_of_but');
            $table->string('residential_address')->nullable();
            $table->string('login');
            $table->decimal('balance')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('profileable_id');
            $table->string('profileable_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
