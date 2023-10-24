<?php

namespace App\Service;

use Exception;

class CalculatorService
{

    public function calculate(int|float $operandX, int|float $operandY, string $operation): float
    {

        return match ($operation) {
            'add'       => $this->add($operandX, $operandY),
            'subtract'  => $this->subtract($operandX, $operandY),
            'multiply'  => $this->multiply($operandX, $operandY),
            'divide'    => $this->divide($operandX, $operandY),
            default     => throw new Exception('Invalid Operation type!')
        };
    }

    public function add($operandX, $operandY)
    {
        return $operandX + $operandY;
    }

    public function subtract($operandX, $operandY)
    {
        return $operandX - $operandY;
    }

    public function multiply($operandX, $operandY)
    {
        return $operandX * $operandY;
    }

    public function divide($operandX, $operandY)
    {
        if ($operandY == 0) {
            throw new \InvalidArgumentException("Cannot divide by zero.");
        }
        return $operandX / $operandY;
    }
}
