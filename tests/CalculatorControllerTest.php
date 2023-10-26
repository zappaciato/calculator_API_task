<?php

namespace App\tests;

use Exception;
use Symfony\Component\Routing\Route;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Loader\Configurator\request;

class CalculatorControllerTest extends WebTestCase
{

    /**
     * Functional testing. Method Calculate
     *
     * @param [type] $x
     * @param [type] $y
     * @param [type] $operationType
     * @param [type] $result
     * @return void
     * @dataProvider dataProvider
     */
    public function testCalculate($x, $y, $operationType, $result)
    {
        $client = static::createClient();
        $client->request('GET', '/'.$operationType.'/'. $x .'/'. $y);
        $response = $client->getResponse();
        $actual = json_decode($response->getContent(), true)['result'];
        print_r($result);
        print_r($actual);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertSame($result, $actual);
    }

    /**
     * Functional test expecting exceptions;  
     *
     * @param [type] $x
     * @param [type] $y
     * @param [type] $operationType
     * @return void
     *   @dataProvider badDataProvider
     */
    public function testCalculateShouldReturnException($x, $y, $operationType, $result)
    {
        // $this->expectException(Exception::class);
        // $this->expectExceptionMessage('Invalid Operation type!');
        // the above is not required as the controller does not throw exception
        $client = static::createClient();
        $client->request('GET', '/' . $operationType . '/' . $x . '/' . $y);
        $response = $client->getResponse();
        $actual = json_decode($response->getContent(), true);
        $this->assertEquals(200, $response->getStatusCode());
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
            [2, 3, 'add', 5],
            [100, 2, 'divide', 50],
            [2, 3, 'multiply', 6],
        ];
    }

    /**
     * incorrecct data Privider for exception test cases
     *
     * @return void
     */
    public static function badDataProvider()
    {
        return [
            [2, 'b', 'add', 'Invalid Operands: 2 and b'],
            [100, 2, 'vvv_)', 'Invalid Operation type!'],

        ];
    }
}
