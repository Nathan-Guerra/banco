<?php

namespace Nathan\Banco\Models\Conta;

use Nathan\Banco\Models\Conta\Titular;

abstract class Conta
{
    protected $saldo;
    private static $numeroContas;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
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

    abstract protected function sacar(float $valorSaque): bool;

    public function depositar(float $valorDeposito): bool
    {
        if ($valorDeposito <= 0) return false;

        $this->saldo += $valorDeposito;
        return true;
    }

    public static function retornaNumeroContas()
    {
        return self::$numeroContas;
    }
}
