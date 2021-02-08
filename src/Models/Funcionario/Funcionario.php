<?php

namespace Nathan\Banco\Models\Funcionario;

use Nathan\Banco\Models\Pessoa\Pessoa;
use Nathan\Banco\Models\CPF;

abstract class Funcionario extends Pessoa
{
    protected $salario;

    public function __construct(string $nome, CPF $cpf, $salario)
    {
        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    public function recebeAumento(float $valorAumento): bool
    {
        if ($valorAumento <= 0) return false;

        $this->salario += $valorAumento;

        return true;
    }

    public function retornaSalario(): float
    {
        return $this->salario;
    }

    public function calculaBonificacao(): float
    {
        return $this->salario * 0.1;
    }
}
