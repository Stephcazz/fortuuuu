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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique();
            $table->string('name');
            $table->string('iban');
            $table->string('bic');
            $table->string('address');
            $table->string('administrative_name');
            $table->string('administrative_phone');
            $table->string('operation_total');
            $table->string('apport_total');
            $table->string('financing_total');
            $table->boolean('operation_active');
            $table->boolean('apport_active');
            $table->boolean('financing_active');
            $table->string('document');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
