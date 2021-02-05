<?php

namespace Models;

use Models\Pessoa\Pessoa;

class Conta
{
    private $saldo;
    private static $numeroContas;

    public function __construct(Pessoa $pessoa)
    {
        $this->titular = $pessoa;
        $this->saldo = 0;

        self::$numeroContas++;
    }

    public function __destruct()
    {
        self::$numeroContas--;
    }

    public function retornaNomeTitular(): string
    {
        return $this->titular->retornaNome();
    }

    public function retornaCPF(): string
    {
        return $this->titular->retornaCPF();
    }

    public function retornaSaldo(): float
    {
        return $this->saldo;
    }

    public function sacar(float $valorSaque): bool
    {
        if ($this->saldo < $valorSaque) return false;

        $this->saldo -= $valorSaque;
        return true;
    }

    public function depositar(float $valorDeposito): bool
    {
        if ($valorDeposito <= 0) return false;

        $this->saldo += $valorDeposito;
        return true;
    }

    public function transferir(float $valorTransferencia, Conta $conta): bool
    {
        if ($valorTransferencia <= 0) return false;

        $this->sacar($valorTransferencia);
        $conta->depositar($valorTransferencia);
        return true;
    }

    public static function retornaNumeroContas()
    {
        return self::$numeroContas;
    }
}
