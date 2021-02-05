<?php

namespace Models;

class Endereco
{
    private $endereco;
    private $numero;
    private $cidade;

    public function __construct(string $endereco, string $numero, string $cidade)
    {
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->cidade = $cidade;
    }
}
