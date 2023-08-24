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
        Schema::create('primeiras_sessoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->dateTime('data_sessao', $precision = 0);
            $table->string('plano_de_saude', 255)->default('N/A');
            $table->text('p1')->default('N/A');
            $table->text('p2')->default('N/A');
            $table->text('p3')->default('N/A');
            $table->text('p4')->default('N/A');
            $table->text('p5')->default('N/A');
            $table->text('p6')->default('N/A');
            $table->text('p7')->default('N/A');
            $table->text('p8')->default('N/A');
            $table->text('p9')->default('N/A');
            $table->text('p10')->default('N/A');
            $table->enum('anamnese', ['sim', 'não']);
            $table->text('hipoteses_diagnostica')->default('N/A');
            $table->timestamps();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primeiras_sessoes');
    }
};
