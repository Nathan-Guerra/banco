<?php

namespace Nathan\Banco\Models\Funcionario;

use Nathan\Banco\Models\CPF;

class Desenvolvedor extends Funcionario
{
    public function __construct(string $nome, CPF $cpf, float $salario)
    {
        parent::__construct($nome, $cpf, $salario);
    }

    public function calculaBonificacao(): float
    {
        return $this->salario * 0.05;
    }

    public function sobeDeNivel(): void
    {
        $this->recebeAumento($this->retornaSalario() * 0.75);
    }
}
