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
        Schema::create('registro_sessoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('consulta_id');
            $table->integer('rotina')->nullable();
            $table->integer('sono')->nullable();
            $table->integer('alimentacao')->nullable();
            $table->integer('atividade_fisica')->nullable();
            $table->integer('intestino')->nullable();
            $table->integer('ansiedade')->nullable();
            $table->integer('tristeza')->nullable();
            $table->integer('alegria')->nullable();
            $table->integer('motivacao')->nullable();
            $table->integer('autoestima')->nullable();
            $table->text('agenda')->nullable();
            $table->text('ponte')->nullable();
            $table->text('atividades_semana')->nullable();
            $table->text('ajuda')->nullable();
            $table->text('proxima_sessao')->nullable();
            $table->text('feedback')->nullable();
            $table->text('aprendizagem')->nullable();
            $table->text('observacao')->nullable();
            $table->text('problemas')->nullable();
            $table->text('resolucoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_sessoes');
    }
};
