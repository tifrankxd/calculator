<?php
class Calculator {
    public function calculate($num1, $num2, $operation) {
        switch($operation) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            // ... otros casos ...
            default:
                return "Operación no válida";
        }
    }
} 