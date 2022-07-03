<?php


namespace App\Services;

abstract class AbstractCalculator
{
  protected $values = [];

  abstract protected function validateValues($values = []);

  public function evalResut($val1, $val2, $operator = '')
  {
    $this->validateValues([$val1, $val2]);
    switch ($operator) {
      case '+':
        return $val1 + $val2;
      case '-':
        return $val1 - $val2;
      case '*':
        return $val1 * $val2;
      case '/':
        return $val1 / $val2;
      default:
        throw new \InvalidArgumentException("Invalid operator ${operator} specified");
    }
  }

  public function getResult()
  {
    return $this->result;
  }
}
