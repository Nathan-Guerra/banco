<?php

require_once 'src/autoload.php';

use Models\Conta;
use Models\Endereco;
use Models\Pessoa\Pessoa;
use Models\Pessoa\CPF;

$conta = new Conta(
    new Pessoa(
        'Nathan Guerra de Oliveira',
        new CPF('143.094.857-40')
    )
);

echo 'ok';
