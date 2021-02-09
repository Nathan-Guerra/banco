<?php

namespace Nathan\Banco\Models;

use Nathan\Banco\Models\CPF;
use Nathan\Banco\Models\NomeInvalidoException;

class Pessoa
{
    private $nome;
    private $CPF;

    public function __construct(string $nome, CPF $CPF)
    {
        try {
            $this->validaNome($nome);
        } catch (NomeInvalidoException $e) {
            die ('Precisa informar um sobrenome.');
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
        if (preg_match('/\s/', $nome) == false) {
            throw new NomeInvalidoException();
        }
        return true;
    }
}
