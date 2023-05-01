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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            $table->string('type');
            $table->string('cheque_number');
            $table->string('cheque_date');
            $table->string('reminder_before_days');
            $table->string('amount');
            $table->string('bank_name');
            $table->string('party_name');
            $table->string('party_contact')->nullable();
            $table->string('note')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheques');
    }
};
