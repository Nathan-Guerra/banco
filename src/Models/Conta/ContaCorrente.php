<?php

namespace Nathan\Banco\Models\Conta;

use Nathan\Banco\Models\Conta\Titular;

class ContaCorrente extends Conta
{

    public function __construct(Titular $titular)
    {
        parent::__construct($titular);
    }

    private function percentualTarifa(): float
    {
        return 0.05;
    }

    public function transferir(float $valorTransferencia, Conta $conta): bool
    {
        if ($valorTransferencia <= 0) return false;

        $this->sacar($valorTransferencia);
        $conta->depositar($valorTransferencia);

        return true;
    }

    public function sacar(float $valorSaque): bool
    {
        $tarifaSaque = $valorSaque * $this->percentualTarifa();
        $valorASacar = $valorSaque + $tarifaSaque;

        if ($this->saldo < $valorASacar) {
            throw new SaldoInsuficienteException($valorASacar, $this->saldo);
        };

        $this->saldo -= $valorASacar;

        return true;
    }
}
