<?php

use App\Services\Calculator;

require_once './vendor/autoload.php';

//script read input from command line
$input = readline("Entrer un expression: ");
// - (5-3) * (5+3)
// - (6/3) * (5-3)
// - (6+3) * (5-3)
// $input = " 7/78";
// $input = "(6+3) / (5-3)";
printf("Expression saisie: %s\n", $input);
$calculator = new Calculator();
$result = $calculator->calculate($input);
printf("Resultat: %s\n", $result);
