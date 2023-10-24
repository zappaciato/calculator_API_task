<?php

namespace App\Utilities;

use Exception;

class InputValidator
{

    public static function validate($operand_x, $operand_y)
    {
        if (is_numeric($operand_x) && is_numeric($operand_y)) {

            return true;
        }

        throw new Exception('Invalid Operands: ' . $operand_x . ' and ' . $operand_y);
    }
}
