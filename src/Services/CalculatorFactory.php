<?php

namespace App\Services;

use Exception;

class CalculatorFactory
{

  public function initializeCalc($expression)
  {
    if (preg_match(MultipleCalculator::MULTIPLE_PATTERN_CALCULATOR, $expression)) {
      return new MultipleCalculator($expression);
    }
    if (preg_match(SimpleCalculator::SIMPLE_PATTERN_CALCULATOR, $expression)) {
      return new SimpleCalculator($expression);
    }
    throw new Exception("Invalid expression ${expression}");
  }
}
