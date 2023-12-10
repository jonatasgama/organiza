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
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->text('familia_avalicao_1_a_5')->nullable();
            $table->text('familia_gostaria_de_alcancar')->nullable();
            $table->text('familia_dificuldades')->nullable();
            $table->text('familia_diferente')->nullable();
            $table->text('saude_avaliacao_1_a_5')->nullable();
            $table->text('saude_gostaria_de_alcancar')->nullable();
            $table->text('saude_dificuldades')->nullable();
            $table->text('saude_diferente')->nullable();
            $table->text('profissional_avaliacao_1_a_5')->nullable();
            $table->text('profissional_gostaria_de_alcancar')->nullable();
            $table->text('profissional_dificuldades')->nullable();
            $table->text('profissional_diferente')->nullable();
            $table->text('lazer_avaliacao_1_a_5')->nullable();
            $table->text('lazer_gostaria_de_alcancar')->nullable();
            $table->text('lazer_dificuldades')->nullable();
            $table->text('lazer_diferente')->nullable();
            $table->text('financeiro_avaliacao_1_a_5')->nullable();
            $table->text('financeiro_gostaria_de_alcancar')->nullable();
            $table->text('financeiro_dificuldades')->nullable();
            $table->text('financeiro_diferente')->nullable();
            $table->text('afetiva_avaliacao_1_a_5')->nullable();
            $table->text('afetiva_gostaria_de_alcancar')->nullable();
            $table->text('afetiva_dificuldades')->nullable();
            $table->text('afetiva_diferente')->nullable();
            $table->text('academia_avaliacao_1_a_5')->nullable();
            $table->text('academia_gostaria_de_alcancar')->nullable();
            $table->text('academia_dificuldades')->nullable();
            $table->text('academia_diferente')->nullable();
            $table->text('espiritualidade_avaliacao_1_a_5')->nullable();
            $table->text('espiritualidade_gostaria_de_alcancar')->nullable();
            $table->text('espiritualidade_dificuldades')->nullable();
            $table->text('espiritualidade_diferente')->nullable();
            $table->text('social_avaliacao_1_a_5')->nullable();
            $table->text('social_gostaria_de_alcancar')->nullable();
            $table->text('social_dificuldades')->nullable();
            $table->text('social_diferente')->nullable();
            $table->text('justica_social_avaliacao_1_a_5')->nullable();
            $table->text('justica_social_gostaria_de_alcancar')->nullable();
            $table->text('justica_social_dificuldades')->nullable();
            $table->text('justica_social_diferente')->nullable();
            $table->text('autoconceito_avaliacao_1_a_5')->nullable();
            $table->text('autoconceito_gostaria_de_alcancar')->nullable();
            $table->text('autoconceito_dificuldades')->nullable();
            $table->text('autoconceito_diferente')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
