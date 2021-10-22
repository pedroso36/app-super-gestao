<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criando a coluna em produtos que vai receber a FK de fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            //INSERINDO UM REGISTRO ALEATORIO PARA NÃO DAR ERRO NA HORA QUE FOR CRIADA A COLUNA FORNECEDOR ID SEM NENHUM VALOR
            $fornecedor_id = DB::table('fornecedores')->insertGetid([
                'nome' => 'fornecedorpadrao-sg',
                'site' => 'fornecedorpadrao.com',
                'uf' => 'RS',
                'email' => 'contato@fornecedorsg.com.br'
            ]);
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            // Estabelecendo a contraint do relacionamento
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeing('produtos_fornecedor_id_foreing');
            $table->dropColumn('fornecedor_id');
        });
    }
}
