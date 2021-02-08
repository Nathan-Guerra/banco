<?php

require_once 'src/autoload.php';

use Nathan\Banco\Models\{CPF, Endereco};
use Nathan\Banco\Models\Funcionario\Diretor;
use Nathan\Banco\Models\Funcionario\Gerente;
use Nathan\Banco\Models\Funcionario\Desenvolvedor;
use Nathan\Banco\Services\ControladorBonificacoes;
use Nathan\Banco\Models\Conta\{ContaCorrente, ContaPoupanca, Titular};

$conta = new ContaCorrente(
    new Titular(
        'Nathan Guerra de Oliveira',
        new CPF('082.202.660-07'),
        new Endereco('Resende', 'Rua Monteiro Lobato', '18', 'Itapuca')
    )
);

$conta->depositar(500);
$conta->sacar(400);

$conta2 = new ContaPoupanca(
    new Titular(
        'Leticia de Cassia Bandeira de Souza',
        new CPF('551.480.020-26'),
        new Endereco('Resende', 'Rua Maria Tereza das Dores', '40', 'Itapuca')
    )
);

$conta2->depositar(500);
$conta2->sacar(100);

$conta->transferir(10, $conta2);

echo $conta->retornaSaldo() . PHP_EOL;
echo $conta2->retornaSaldo() . PHP_EOL;

$funcionario = new Desenvolvedor('Nathan Guerra', new CPF('387.236.080-99'), 100);
$funcionaria = new Gerente('Leticia Bandeira', new CPF('791.188.610-59'), 500);
$diretor = new Diretor('A B', new CPF('624.703.730-93'), 5000);

$funcionario->sobeDeNivel();

$controladorBonificacoes = new ControladorBonificacoes();
$controladorBonificacoes->bonificaFuncionario($funcionario);
$controladorBonificacoes->bonificaFuncionario($funcionaria);
$controladorBonificacoes->bonificaFuncionario($diretor);

echo $controladorBonificacoes->retornaTotalBonificacoes() . PHP_EOL;


echo $funcionario->retornaSalario();
