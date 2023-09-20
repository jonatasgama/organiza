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
        Schema::table('pacientes', function (Blueprint $table) {
            $table->unsignedBigInteger('primeira_sessao_id')->nullable();
            $table->foreign('primeira_sessao_id')->references('id')->on('primeiras_sessoes');
            $table->softDeletes();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropForeign('pacientes_primeira_sessao_id_foreign');
            $table->dropColumn('primeira_sessao_id');
            $table->dropSoftDeletes();
        });
    }
};
