<?php

namespace Nathan\Banco\Models\Pessoa;

use Nathan\Banco\Models\CPF;

class Pessoa
{
    private $nome;
    private $CPF;

    public function __construct(string $nome, CPF $CPF)
    {
        if ($this->validaNome($nome) === false) {
            die('Sobrenome necessario');
            return;
        }
        $this->nome = $nome;
        $this->CPF = $CPF;
    }

    public function retornaNome(): string
    {
        return $this->nome;
    }

    public function retornaCPF(): string
    {
        return $this->CPF->retornaCPF();
    }

    final private function validaNome(string $nome): bool
    {
        return preg_match('/\s/', $nome);
    }
}
