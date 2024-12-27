import React, { useState } from 'react';
import './Calculator.css';

function Calculator() {
    const [display, setDisplay] = useState('');
    const [firstNumber, setFirstNumber] = useState(null);
    const [operation, setOperation] = useState(null);

    const appendNumber = (num) => {
        setDisplay(display + num);
    };

    const setOp = (op) => {
        setFirstNumber(parseFloat(display));
        setOperation(op);
        setDisplay('');
    };

    const calculate = () => {
        const secondNumber = parseFloat(display);
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
            default:
                return;
        }
        
        setDisplay(result.toString());
    };

    const clear = () => {
        setDisplay('');
        setFirstNumber(null);
        setOperation(null);
    };

    return (
        <div className="calculator">
            <input type="text" value={display} readOnly />
            <div className="buttons">
                <button onClick={() => appendNumber('7')}>7</button>
                <button onClick={() => appendNumber('8')}>8</button>
                <button onClick={() => appendNumber('9')}>9</button>
                <button onClick={() => setOp('/')}>/</button>

                <button onClick={() => appendNumber('4')}>4</button>
                <button onClick={() => appendNumber('5')}>5</button>
                <button onClick={() => appendNumber('6')}>6</button>
                <button onClick={() => setOp('*')}>×</button>

                <button onClick={() => appendNumber('1')}>1</button>
                <button onClick={() => appendNumber('2')}>2</button>
                <button onClick={() => appendNumber('3')}>3</button>
                <button onClick={() => setOp('-')}>-</button>

                <button onClick={() => appendNumber('0')}>0</button>
                <button onClick={() => appendNumber('.')}>.</button>
                <button onClick={calculate}>=</button>
                <button onClick={() => setOp('+')}>+</button>
            </div>
            <button onClick={clear} style={{width: '100%', marginTop: '10px'}}>Clear</button>
        </div>
    );
}

export default Calculator; 