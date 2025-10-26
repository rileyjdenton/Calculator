<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Calculator</title>
</head>
<body>

  <form class="calc-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h2>Simple Calculator</h2>
    
    <div class="input-group">
      <input type="number" name="num01" placeholder="Enter first number" required>
      
      <select name="operator" required>
        <option value="addition">+</option>
        <option value="subtraction">−</option>
        <option value="multiply">×</option>
        <option value="divide">÷</option>
      </select>
      
      <input type="number" name="num02" placeholder="Enter second number" required>
    </div>

    <button type="submit" name="submit">Calculate</button>
  </form>

  <?php 
  if (isset($_POST["submit"])) {
    
        // Filters the inputs from form.
        $num01 = filter_input(INPUT_POST, 'num01', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $num02 = filter_input(INPUT_POST, 'num02', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_STRING); 


        switch ($operator) {
            case "addition":
                $result = $num01 + $num02;
                break;
            case "subtraction":
                $result = $num01 - $num02;
                break;
            case "multiply":
                $result = $num01 * $num02;
                break;
            case "divide":
                $result = ($num02 != 0) ? $num01 / $num02 : "Cannot divide by zero";
                break;
            default:
                $result = "Error in calculation";
                break;
        }

      echo "<div class='result-box'>Result: $result</div>";
  }
  ?>

</body>
</html>
