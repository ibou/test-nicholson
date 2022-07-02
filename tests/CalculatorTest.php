<?php

namespace App\Tests;

use App\Classes\Calculator;


class CalculationTest extends \PHPUnit_Framework_TestCase
{
  /**
   * @dataProvider dataProviderExpressions
   */
  public function testCalculate($expression, $value)
  {
    $calculator = new Calculator();
    $calculator->calculate($expression);
    $this->assertEquals($value, $calculator->getResult());
  }

  public function dataProviderExpressions()
  {
    yield 'term with add' => ['(5-3) + (5+3)', 10];
    yield 'term with add and myltiply' => ['(6/3) * (5-3)', 4];
    yield 'term with multiply 1' => ['(5-3) * (5+3)', 16];
    yield 'term with multiply 2' => ['(6/3) * (5-3)', 4];
    yield 'term with divide' => ['(5+9) / (5-2)', 4.67];
    yield 'term with minus' => ['(5-3) - (5+3)', -6];
  }
}
