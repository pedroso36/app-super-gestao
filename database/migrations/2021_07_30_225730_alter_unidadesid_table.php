<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUnidadesidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ADICIONAR O RELACIONAMENTO COM A TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // ADICIONAR O RELACIONAMENTO COM A TABELA PRODUTO_DETALHES
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // REMOVER O RELACIONAMENTO COM A TABELA PRODUTO_DETALHES
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //REMOVER A FOREIGN KEY   //[table]_[column]_foreing
            // $table->dropForeign(['produto_detalhes_produto_id_foreign']);
            $table->dropForeign(['unidade_id']);
            //REMOVER A COLUNA UNIDADE_ID
            $table->dropColumn('unidade_id');
        });


        // REMOVER O RELACIONAMENTO COM A TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['unidade_id']);
            $table->dropColumn('unidade_id');
        });
    }
}
