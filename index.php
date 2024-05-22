<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        input[type="number"], select {
            margin-right: 5px;
            font-size: 16px;
        }
        .result {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Simple Calculator</h1>
    <form action="" method="post">
        Enter values for X and Y: <br>
        <input type="number" name="x" step="0.01" value="<?php echo isset($_POST['x']) ? $_POST['x'] : ''; ?>" required>
        <select name="operation">
            <option value="add" <?php echo isset($_POST['operation']) && $_POST['operation'] == 'add' ? 'selected' : ''; ?>>+</option>
            <option value="subtract" <?php echo isset($_POST['operation']) && $_POST['operation'] == 'subtract' ? 'selected' : ''; ?>>-</option>
            <option value="multiply" <?php echo isset($_POST['operation']) && $_POST['operation'] == 'multiply' ? 'selected' : ''; ?>>*</option>
            <option value="divide" <?php echo isset($_POST['operation']) && $_POST['operation'] == 'divide' ? 'selected' : ''; ?>>/</option>
        </select>
        <input type="number" name="y" step="0.01" value="<?php echo isset($_POST['y']) ? $_POST['y'] : ''; ?>" required>
        <button type="submit">Calculate</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['x']) && isset($_POST['y']) && isset($_POST['operation'])) {
            $x = floatval($_POST['x']);
            $y = floatval($_POST['y']);
            $operation = $_POST['operation'];
            $result = 0;
            switch ($operation) {
                case 'add':
                    $result = $x + $y;
                    break;
                case 'subtract':
                    $result = $x - $y;
                    break;
                case 'multiply':
                    $result = $x * $y;
                    break;
                case 'divide':
                    if ($y != 0) {
                        $result = $x / $y;
                    } else {
                        $result = "Error: Division by Zero";
                    }
                    break;
            }
            echo "<div class='result'>Calculated Value: $result</div>";
        }
    ?>
</body>
</html>
