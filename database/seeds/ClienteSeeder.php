<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome' => 'Wellington Ribeiro',
            'nascimento' => '1992-05-26',
            'sexo' => 'Masculino',
            'nacionalidade' => 'Brasileiro',
            'naturalidade' => 'Jequié',
            'estado_civil' => 'Casado',
            'rg' => '00000000-00',
            'uf' => 'BA',
            'orgao_emissor' => 'ssp',
            'data_expedicao' => '2007-06-02',
            'cpf' => '000.000.000-00',
            'fixo' => '(73)9999-9999',
            'celular' => '',
            'cep' => '45201-520',
            'logradouro' => 'Rua Belém',
            'numero' => '0',
            'bairro' => 'cansanção',
            'cidade' => 'Jequié',
            'estado' => 'Bahia',
            'complemento' => '',
            'email' => 'cleinte@gmail.com',
            'password' => bcrypt('123'),
            'created_at' => now(),
            'updated_at' => now()
        ] );
    }
}
