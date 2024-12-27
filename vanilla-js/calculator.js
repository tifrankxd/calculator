let displayValue = '';
let firstNumber = null;
let operation = null;

function appendNumber(num) {
    displayValue += num;
    document.getElementById('display').value = displayValue;
}

function setOperation(op) {
    firstNumber = parseFloat(displayValue);
    operation = op;
    displayValue = '';
}

function calculate() {
    const secondNumber = parseFloat(displayValue);
    let result = 0;
    
    switch(operation) {
        case '+':
            result = firstNumber + secondNumber;
            break;
        case '-':
            result = firstNumber - secondNumber;
            break;
        case '*':
            result = firstNumber * secondNumber;
            break;
        case '/':
            result = firstNumber / secondNumber;
            break;
    }
    
    document.getElementById('display').value = result;
    displayValue = result.toString();
}

function clear() {
    displayValue = '';
    firstNumber = null;
    operation = null;
    document.getElementById('display').value = '';
} 