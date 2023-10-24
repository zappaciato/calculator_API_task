<?php

namespace App\Service;

use Exception;

class CalculatorService
{

    /**
     * Function which triggers mathematical operation depending on the request.
     * Returns float and accepts three parameters operandX (integer and float type) and operandY (integer and float type)
     * and Operation (string), which is used as a condition in match() method.
     *
     * @param integer|float $operandX
     * @param integer|float $operandY
     * @param string $operation
     * @return float
     */
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

    /**
     * Function performing calculation (adding) on two operands.
     *
     * @param [type] $operandX
     * @param [type] $operandY
     * @return float
     */
    public function add($operandX, $operandY) : float
    {
        return $operandX + $operandY;
    }
    /**
     * Function performing calculation (subtracting) on two operands.
     *
     * @param [type] $operandX
     * @param [type] $operandY
     * @return float
     */
    public function subtract($operandX, $operandY) : float
    {
        return $operandX - $operandY;
    }

    /**
     * Function performing calculation (multiplying) on two operands.
     *
     * @param [type] $operandX
     * @param [type] $operandY
     * @return float
     */
    public function multiply($operandX, $operandY) : float
    {
        return $operandX * $operandY;
    }

    /**
     * Function performing calculation (dividing) on two operands.
     *
     * @param [type] $operandX
     * @param [type] $operandY
     * @return float
     */
    public function divide($operandX, $operandY) : float
    {
        if ($operandY == 0) {
            throw new \InvalidArgumentException("Cannot divide by zero.");
        }
        
        return $operandX / $operandY;
    }
}
