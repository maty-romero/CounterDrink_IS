<?php

namespace App\Interfaces;

interface IPasarela
{
    public function pagar(float $monto);
}