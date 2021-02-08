<?php

namespace Nathan\Banco\Models\Conta;

use Nathan\Banco\Models\Pessoa\Pessoa;
use Nathan\Banco\Models\Endereco;
use Nathan\Banco\Models\CPF;

class Titular extends Pessoa
{
    private $endereco;

    public function __construct(string $nome, CPF $cpf, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function retornaEndereco(): Endereco
    {
        return $this->endereco;
    }
}
