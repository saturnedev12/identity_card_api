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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('numCNI')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->date('dateNaiss')->nullable();
            $table->string('lieuNaiss')->nullable();
            $table->string('telephone')->nullable();
            $table->string('signature')->nullable();
            $table->string('empreintes')->nullable();
            $table->string('visage')->nullable();
            $table->string('taille')->nullable();
            $table->date('dateEnrollement')->nullable();
            $table->date('dateEmission')->nullable();
            $table->date('dateExpiration')->nullable();
            $table->string('sexe')->nullable();
            $table->string('profession')->nullable();

            $table->foreignId('nationalite_id')->constrained()->nullable();

            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
