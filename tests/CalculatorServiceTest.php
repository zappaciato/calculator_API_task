<?php

namespace App\tests;

use Exception;
use PHPUnit\Framework\TestCase;
use App\Service\CalculatorService;


class CalculatorServiceTest extends TestCase
{
    /**
     * Unit test: calculate
     *
     * @return void 
     * @dataProvider dataProvider
     */
    public function testCalculate($x, $y, $operationType, $result)
    {
        $calculatorUnderTest = new CalculatorService();
        $actual = $calculatorUnderTest->calculate($x, $y, $operationType, $result);
        $this->assertEquals($result, $actual);
    }

    /**
     * data Privider for different test cases
     *
     * @return void
     */
    public static function dataProvider()
    {
        return [
            'Testing adding'                => [2, 3, 'add', 5],
            'Testing dividing'              => [100, 2, 'divide', 50],
            'Testing multiplying'           => [2, 3, 'multiply', 6],
            'Testing subtracting'           => [2, 3, 'subtract', -1],
            'Testing adding a float'        => [20.2, 2, 'subtract', 18.2],
            'Testing multiplying a float'   => [20.2, 2, 'multiply', 40.4],
        ];
    }

    /**
     * Unit test invalid operator exception. Operands are validated by input validator in the controller.
     * no bad dataProvider as only bad operation Type needs to be tested;
     * @return void
     */
    public function testCalculateShouldReturnException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Invalid Operation type!');
        $calculatorUnderTest = new CalculatorService();
        $calculatorUnderTest->calculate(4, 10, "invalidOperationType!!xdwe");
    }
}
