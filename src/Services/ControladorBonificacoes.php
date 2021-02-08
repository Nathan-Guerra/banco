<?php

namespace Nathan\Banco\Services;

use Nathan\Banco\Models\Funcionario\Funcionario;

class ControladorBonificacoes {
    private $totalBonificacoes = 0;

    public function bonificaFuncionario(Funcionario $funcionario) {
        $this->totalBonificacoes += $funcionario->calculaBonificacao();    
    }

    public function retornaTotalBonificacoes() :float {
        return $this->totalBonificacoes;
    }
}
