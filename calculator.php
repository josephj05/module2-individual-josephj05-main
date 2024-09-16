<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <h1>PHP Calculator</h1>
    <form action="" method="post">
        <label for="num1">Enter first number:</label>
        <input type="text" id="num1" name="num1" required>
        <br><br>
        
        <label for="num2">Enter second number:</label>
        <input type="text" id="num2" name="num2" required>
        <br><br>

        <label>Select Operation:</label><br>
        <input type="radio" id="add" name="operation" value="add" required>
        <label for="add">Addition</label><br>

        <input type="radio" id="subtract" name="operation" value="subtract">
        <label for="subtract">Subtraction</label><br>

        <input type="radio" id="multiply" name="operation" value="multiply">
        <label for="multiply">Multiplication</label><br>

        <input type="radio" id="divide" name="operation" value="divide">
        <label for="divide">Division</label><br><br>

        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        if (is_numeric($num1) && is_numeric($num2)) {
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    echo "<h2>Result: $num1 + $num2 = $result</h2>";
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    echo "<h2>Result: $num1 - $num2 = $result</h2>";
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    echo "<h2>Result: $num1 * $num2 = $result</h2>";
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                        echo "<h2>Result: $num1 / $num2 = $result</h2>";
                    } else {
                        echo "<h2>Error: Division by zero is not allowed!</h2>";
                    }
                    break;
                default:
                    echo "<h2>Please select an operation</h2>";
            }
        } else {
            echo "<h2>Error: Please enter valid numbers</h2>";
        }
    }
    ?>
</body>
</html>
