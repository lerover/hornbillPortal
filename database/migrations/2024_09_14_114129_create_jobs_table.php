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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id')->comment('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('position');
            $table->longText('description')->nullable();
            $table->decimal('salary', 8, 2);
            $table->string('showhide_status')->default('show');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
