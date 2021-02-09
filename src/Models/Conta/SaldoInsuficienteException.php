<?php

namespace Nathan\Banco\Models\Conta;

class SaldoInsuficienteException extends \DomainException
{
    public function __construct(float $valorSaque, float $saldo)
    {
        $mensagem = "Voce tentou sacar $valorSaque, mas tem apenas $saldo em conta.";
        parent::__construct($mensagem);
    }
}
