<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calculator {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="number"] {
            width: 100px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h1>Simple PHP Calculator</h1>
    <form action="" method="post">
        <label for="num1">First Number:</label>
        <input type="number" step="0.01" name="num1" required><br>

        <label for="num2">Second Number:</label>
        <input type="number" step="0.01" name="num2" required><br>

        <label for="operation">Select Operation:</label><br>
        <input type="radio" name="operation" value="add" required> Addition<br>
        <input type="radio" name="operation" value="subtract"> Subtraction<br>
        <input type="radio" name="operation" value="multiply"> Multiplication<br>
        <input type="radio" name="operation" value="divide"> Division<br>

        <input type="submit" name="calculate" value="Calculate">
    </form>

    <div class="result">
        <?php
        if (isset($_POST['calculate'])) {
            $num1 = (float)$_POST['num1'];
            $num2 = (float)$_POST['num2'];
            $operation = $_POST['operation'];
            $result = '';

            if ($operation == 'add') {
                $result = $num1 + $num2;
            } elseif ($operation == 'subtract') {
                $result = $num1 - $num2;
            } elseif ($operation == 'multiply') {
                $result = $num1 * $num2;
            } elseif ($operation == 'divide') {
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Error: Division by zero';
                }
            }

            echo "Result: " . $result;
        }
        ?>
    </div>
</div>

</body>
</html>
