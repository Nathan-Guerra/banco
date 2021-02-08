<?php

namespace Nathan\Banco\Models\Funcionario;

use Nathan\Banco\Models\CPF;
use Nathan\Banco\Models\Funcionario\Funcionario;

class Gerente extends Funcionario
{
    public function __construct(string $nome, CPF $cpf, float $salario)
    {
        parent::__construct($nome, $cpf, $salario);
    }

    public function calculaBonificacao(): float
    {
        return $this->retornaSalario();
    }
}
