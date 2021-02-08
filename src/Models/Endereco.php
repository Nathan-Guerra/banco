<?php

namespace Nathan\Banco\Models;

final class Endereco
{
    private $cidade;
    private $bairro;
    private $endereco;
    private $numero;

    public function __construct(string $cidade, string $endereco, string $numero, string $bairro)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->endereco = $endereco;
        $this->numero = $numero;
    }

    public function recuperaCidade(): string
    {
        return $this->cidade;
    }

    public function recuperaBairro(): string
    {
        return $this->bairro;
    }

    public function recuperaEndereco(): string
    {
        return $this->endereco;
    }

    public function recuperaNumero(): string
    {
        return $this->numero;
    }
}
