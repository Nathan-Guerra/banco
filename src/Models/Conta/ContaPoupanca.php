<?php

namespace Nathan\Banco\Models\Conta;

use Nathan\Banco\Models\Conta\Titular;

class ContaPoupanca extends Conta
{

    public function __construct(Titular $titular)
    {
        parent::__construct($titular);
    }

    private function percentualTarifa(): float
    {
        return 0.03;
    }

    public function sacar(float $valorSaque): bool
    {
        $tarifaSaque = $valorSaque * $this->percentualTarifa();
        $valorASacar = $valorSaque + $tarifaSaque;
        if ($this->saldo < $valorASacar) return false;

        $this->saldo -= $valorASacar;
        return true;
    }
}
