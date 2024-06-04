<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multipurpose Calculator</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calculator {
            background-color:green;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator input, .calculator select, .calculator button {
            margin: 10px 10;
            padding: 10px;
            width: 100%;
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <select name="operation">
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponentiate">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="log">Logarithm</option>
            </select>
            <input type="number" name="num2" placeholder="Enter second number (if applicable)">
            <button type="submit">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $operation = $_POST['operation'];
            $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;

            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Division by zero error!";
                    }
                    break;
                case "exponentiate":
                    $result = pow($num1, $num2);
                    break;
                case "percentage":
                    $result = ($num1 / 100) * $num2;
                    break;
                case "sqrt":
                    $result = sqrt($num1);
                    break;
                case "log":
                    if ($num1 > 0) {
                        $result = log($num1);
                    } else {
                        $result = "Logarithm of non-positive number error!";
                    }
                    break;
                default:
                    $result = "Invalid Operation";
            }

            echo "<p>Result: $result</p>";
        }
        ?>
    </div>
</body>
</html>