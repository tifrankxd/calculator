<?php
require_once 'calculator.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calculator = new Calculator();
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = $calculator->calculate($num1, $num2, $operation);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="calculator">
        <form method="post">
            <input type="number" name="num1" required step="any">
            <select name="operation">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">×</option>
                <option value="/">/</option>
            </select>
            <input type="number" name="num2" required step="any">
            <button type="submit">=</button>
        </form>
        <?php if(isset($result)): ?>
        <div class="result">Resultado: <?php echo $result; ?></div>
        <?php endif; ?>
    </div>
    <a href="../index.php" class="back-link">Volver al inicio</a>
</body>

</html>