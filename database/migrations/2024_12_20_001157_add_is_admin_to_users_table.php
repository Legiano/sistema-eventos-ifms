<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Adicionar a coluna 'is_admin' à tabela 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);  // Adiciona a coluna is_admin
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Se necessário, você pode remover a coluna 'is_admin' ao reverter a migração
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
