<?php

namespace Nathan\Banco\Models;

final class CPF
{
    private $CPF;

    public function __construct(string $CPF)
    {
        try {
            $this->validaCPF($CPF);
        } catch (\InvalidArgumentException $e) {
            die($e->getMessage());
        }

        $this->CPF = $CPF;
    }

    public function retornaCPF(): string
    {
        return $this->CPF;
    }

    private function validaCPF(string $CPF): bool
    {
        // somente os numeros
        $numerosCPF = str_replace(['.', '-'], '', $CPF);

        // numero de digitos incorreto
        if (strlen($numerosCPF) !== 11) {
            throw new \InvalidArgumentException('Tamanho do CPF incorreto.');
        }

        // contem apenas um digito distinto
        if (count(array_count_values(str_split($numerosCPF))) == 1) {
            throw new \InvalidArgumentException('CPF inválido.');
        }

        $numerosCPF = str_split($numerosCPF);
        $soma = 0;
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $soma += $numerosCPF[$i] * $j;
        }

        $primeiroDigito = (($soma * 10) % 11  == 10) ? 0 : ($soma * 10) % 11;

        $soma = 0;
        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $soma += $numerosCPF[$i] * $j;
        }

        $segundoDigito = (($soma * 10) % 11  == 10) ? 0 : ($soma * 10) % 11;

        if ($primeiroDigito != $numerosCPF[9] || $segundoDigito != $numerosCPF[10]) {
            throw new \InvalidArgumentException('Dígitos de validação incorretos');
        }

        return true;
    }
}
