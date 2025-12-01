<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitacoes_remocao', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 14)->index();
            $table->string('nome_responsavel');
            $table->boolean('confirmou_nao_divulgamos')->default(false);
            $table->boolean('ciente_dados_publicos')->default(false);
            $table->boolean('ciente_prazo_busca')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_remocao');
    }
};
