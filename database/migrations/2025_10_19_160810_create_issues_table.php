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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            
            // Basic issue information
            $table->string('title');
             $table->string('source');
            $table->text('finding');
            $table->string('category');
            
            // Priority and Status
            $table->enum('priority', ['Low', 'Medium', 'High', 'Critical'])->default('Medium');
            $table->enum('status', ['Open', 'In Progress', 'Resolved', 'Closed'])->default('Open');

            //date
             $table->date('implementation_deadline');

            //  People
           
            $table->string('reported_by');
            
            // Dates
            $table->date('date_reported');
            $table->date('date_resolved')->nullable();
            
            // Resolution
            $table->text('resolution_notes')->nullable();
            
            // Timestamps
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('status');
            $table->index('priority');
            $table->index('category');
            $table->index('date_reported');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};