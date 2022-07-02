<?php

namespace App\Classes;

class Calculator
{
  private $values = [];
  private $result = null;
  public function calculate($expression)
  {
    $this->getValues($expression);
    $this->calculateValues();
  }

  private function calculateValues()
  {
    if (!$this->values) {
      return;
    }
    $resultFirstTerm = $this->evalResut($this->values[0], $this->values[2], $this->values[1]);
    $resultSecondTerm = $this->evalResut($this->values[4], $this->values[6], $this->values[5]);
    $this->result = round($this->evalResut($resultFirstTerm, $resultSecondTerm, $this->values[3]), 2);
  }
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
        return 0;
    }
    return $this->result;
  }

  public function validateValues($values = [])
  {
    foreach ($values as $val) {
      if (!is_numeric($val)) {
        echo "Expression invalide ${val}";
        return;
      }
    }
  }

  public function getResult()
  {
    return $this->result;
  }

  private function getValues($expression)
  {
    $expression = str_replace(' ', '', $expression);
    if (preg_match_all('/\(([0-9]+)([\+\-\*\/]+)([0-9]+)\)([\+\-\*\/]+)\(([0-9]+)([\+\-\*\/]+)([0-9]+)\)/', $expression, $matches)) {

      $this->values = [
        $matches[1][0],
        $matches[2][0],
        $matches[3][0],
        $matches[4][0],
        $matches[5][0],
        $matches[6][0],
        $matches[7][0],
      ];
    } else {
      echo "Expression invalide \n";
      return;
    }
  }
}
