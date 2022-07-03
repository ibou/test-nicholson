<?php

namespace App\Tests;

use App\Services\Calculator;


class CalculationTest extends \PHPUnit_Framework_TestCase
{
  /**
   * @dataProvider dataProviderMultipleExpressions
   */
  public function testCalculateMultiple($expression, $value)
  {
    $calculator = new Calculator();
    $result = $calculator->calculate($expression);
    $this->assertEquals($value, $result);
  }

  public function dataProviderMultipleExpressions()
  {
    yield 'complex term with add' => ['(5-3) + (5+3)', 10];
    yield 'complex term with add and myltiply' => ['(6/3) * (5-3)', 4];
    yield 'complex term with multiply 1' => ['(5-3) * (5+3)', 16];
    yield 'complex term with multiply 2' => ['(6/3) * (5-3)', 4];
    yield 'complex term with divide' => ['(5+9) / (5-2)', 4.67];
    yield 'complex term with minus' => ['(5-3) - (5+3)', -6];
  }

  /**
   * @dataProvider dataProviderSimpleExpressions
   */
  public function testCalculateSimple($expression, $value)
  {
    $calculator = new Calculator();
    $result = $calculator->calculate($expression);
    $this->assertEquals($value, $result);
  }

  public function dataProviderSimpleExpressions()
  {
    yield 'simple term with add' => ['100-3', 97];
    yield 'simple term with add and myltiply' => ['29+2', 31];
    yield 'simple term with multiply 1' => ['29*2', 58];
    yield 'simple term with divide' => ['9 / 5', 1.8];
  }
}
