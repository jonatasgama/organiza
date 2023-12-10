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
        Schema::table('primeiras_sessoes', function (Blueprint $table) {
            $table->text('metas_terapeuticas')->nullable();
            $table->text('anotacoes_relevantes')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('primeiras_sessoes', function (Blueprint $table) {
            $table->dropColumn('metas_terapeuticas');
            $table->dropColumn('anotacoes_relevantes');
        });
    }
};
