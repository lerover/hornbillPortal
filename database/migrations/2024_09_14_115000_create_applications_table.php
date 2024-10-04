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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('name');
            $table->string('email');
            $table->longText('experience');
            $table->decimal('expected_salary', 8, 2);
            $table->enum('status', ['0', '1', '2'])->default('0')->comment('0: pending, 1: accepted, 2: rejected');

            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
