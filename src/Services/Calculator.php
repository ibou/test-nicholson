<?php

namespace App\Services;

class Calculator
{
  public function calculate($expression)
  {
    $calculatorFactory = new CalculatorFactory();
    $expression = str_replace(' ', '', $expression);
    $calculator = $calculatorFactory->initializeCalc($expression);
    $calculator->execute();
    return $calculator->getResult();
  }
}
