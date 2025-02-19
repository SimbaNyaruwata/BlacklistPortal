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
        Schema::create('blacklisted_clients', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->enum('client_type', ['Business', 'Individual']);
            $table->string('institution');
            $table->string('account_manager');
            $table->date('date_blacklisted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blacklisted_clients');
    }
};
