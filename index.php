<?php

require_once 'src/autoload.php';

use Nathan\Banco\Models\{CPF, Endereco};
use Nathan\Banco\Models\Conta\{ContaCorrente, Titular};

$conta = new ContaCorrente(
    new Titular(
        'Nathan Guerra Oliveira',
        new CPF('082.202.660-07'),
        new Endereco('Resende', 'Rua Monteiro Lobato', '18', 'Itapuca')
    )
);
