<?php
// Start the session to store the memory value
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator with Memory</title>
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
        input[type="submit"], .memory-buttons {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover, .memory-buttons:hover {
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
    <h1>PHP Calculator with Memory</h1>
    <form action="" method="post">
        <label for="num1">First Number:</label>
        <input type="number" step="0.01" name="num1" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>" required><br>

        <label for="num2">Second Number:</label>
        <input type="number" step="0.01" name="num2" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>" required><br>

        <label for="operation">Select Operation:</label><br>
        <input type="radio" name="operation" value="add" required> Addition<br>
        <input type="radio" name="operation" value="subtract"> Subtraction<br>
        <input type="radio" name="operation" value="multiply"> Multiplication<br>
        <input type="radio" name="operation" value="divide"> Division<br>

        <input type="submit" name="calculate" value="Calculate">
    </form>

    <!-- Memory controls -->
    <form action="" method="post">
        <input type="submit" name="store_memory" value="Store to Memory" class="memory-buttons">
        <input type="submit" name="recall_memory" value="Recall Memory" class="memory-buttons">
        <input type="submit" name="clear_memory" value="Clear Memory" class="memory-buttons">
    </form>

    <div class="result">
        <?php
        // Handle calculation
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

            // Store the result in session if a valid number
            if (is_numeric($result)) {
                $_SESSION['result'] = $result;
            }
        }

        // Handle memory store
        if (isset($_POST['store_memory']) && isset($_SESSION['result'])) {
            $_SESSION['memory'] = $_SESSION['result'];
            echo "<br>Memory Stored: " . $_SESSION['memory'];
        }

        // Handle memory recall
        if (isset($_POST['recall_memory'])) {
            if (isset($_SESSION['memory'])) {
                echo "<br>Recalled Memory: " . $_SESSION['memory'];
            } else {
                echo "<br>No value in memory.";
            }
        }

        // Handle memory clear
        if (isset($_POST['clear_memory'])) {
            unset($_SESSION['memory']);
            echo "<br>Memory Cleared.";
        }
        ?>
    </div>
</div>

</body>
</html>
