<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id', 'nome', 'nascimento', 'sexo', 'nacionalidade', 'naturalidade', 'estado_civil', 'rg', 'uf',
        'orgao_emissor', 'data_expedicao', 'cpf', 'fixo', 'celular', 'email', 'password',
        'cep', 'logradouro', 'numero',
    ];

}
