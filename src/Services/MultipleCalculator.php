<?php

namespace App\Services;

class MultipleCalculator extends AbstractCalculator implements ExecutorInterface
{
  const MULTIPLE_PATTERN_CALCULATOR = '/^\(([0-9]+)([\+\-\*\/]+)([0-9]+)\)([\+\-\*\/]+)\(([0-9]+)([\+\-\*\/]+)([0-9]+)\)/';

  private $expression = null;

  public function __construct($expression = null)
  {
    $this->expression = $expression;
  }

  public function execute()
  {
    $this->setValues();
    $this->setResult();
  }

  protected function validateValues($values = [])
  {
    foreach ($values as $val) {
      if (!is_numeric($val)) {
        echo "Expression invalide ${val}";
        return;
      }
    }
  }

  private function setValues()
  {
    if (preg_match_all(self::MULTIPLE_PATTERN_CALCULATOR, $this->expression, $matches)) {
      $this->values = [
        $matches[1][0],
        $matches[2][0],
        $matches[3][0],
        $matches[4][0],
        $matches[5][0],
        $matches[6][0],
        $matches[7][0],
      ];
    }
  }

  private function setResult()
  {
    if (!$this->values) {
      return;
    }
    $resultFirstTerm = $this->evalResut($this->values[0], $this->values[2], $this->values[1]);
    $resultSecondTerm = $this->evalResut($this->values[4], $this->values[6], $this->values[5]);
    $this->result = round($this->evalResut($resultFirstTerm, $resultSecondTerm, $this->values[3]), 2);
  }
}
