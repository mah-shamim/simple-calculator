# Simple Calculator
## Create a basic calculator that can perform addition, subtraction, multiplication, and division.

Creating a basic calculator with PHP, CSS, and AJAX involves a few key components:

1. **Frontend (HTML + CSS + JavaScript/AJAX)**: This handles the user interface and interactions.
2. **Backend (PHP)**: This handles the calculation logic and returns the results.

### 1. Frontend: HTML + CSS + JavaScript/AJAX

**HTML (index.html)**:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" disabled>
        <div class="buttons">
            <button onclick="appendToDisplay('1')">1</button>
            <button onclick="appendToDisplay('2')">2</button>
            <button onclick="appendToDisplay('3')">3</button>
            <button onclick="appendToDisplay('+')">+</button>
            <button onclick="appendToDisplay('4')">4</button>
            <button onclick="appendToDisplay('5')">5</button>
            <button onclick="appendToDisplay('6')">6</button>
            <button onclick="appendToDisplay('-')">-</button>
            <button onclick="appendToDisplay('7')">7</button>
            <button onclick="appendToDisplay('8')">8</button>
            <button onclick="appendToDisplay('9')">9</button>
            <button onclick="appendToDisplay('*')">*</button>
            <button onclick="appendToDisplay('0')">0</button>
            <button onclick="appendToDisplay('.')">.</button>
            <button onclick="calculate()">=</button>
            <button onclick="appendToDisplay('/')">/</button>
            <button onclick="clearDisplay()">C</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
```

**CSS (styles.css)**:
```css
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
}

.calculator {
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    padding: 10px;
    width: 200px;
}

#display {
    width: 100%;
    height: 40px;
    margin-bottom: 10px;
    text-align: right;
    font-size: 24px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.buttons button {
    width: 45px;
    height: 45px;
    font-size: 18px;
    margin: 2px;
    border: 1px solid #ccc;
    border-radius: 3px;
    background-color: #f9f9f9;
    cursor: pointer;
}

.buttons button:hover {
    background-color: #e0e0e0;
}
```

**JavaScript (script.js)**:
```javascript
function appendToDisplay(value) {
    document.getElementById('display').value += value;
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function calculate() {
    var display = document.getElementById('display');
    var expression = display.value;

    if (expression) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'calculate.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                display.value = xhr.responseText;
            }
        };
        xhr.send('expression=' + encodeURIComponent(expression));
    }
}
```

### 2. Backend: PHP

**PHP (calculate.php)**:
```php
<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];

    // Remove any potential security risks
    $expression = preg_replace('/[^0-9+\-.*\/()]/', '', $expression);

    try {
        // Evaluate the expression
        $result = eval('return ' . $expression . ';');
        echo $result;
    } catch (Exception $e) {
        echo 'Error: Invalid expression';
    }
}
?>
```

### Explanation

1. **Frontend (HTML + CSS + JavaScript/AJAX)**:
   - **HTML**: Provides the basic structure of the calculator, including buttons for digits and operations.
   - **CSS**: Styles the calculator to make it look better.
   - **JavaScript/AJAX**:
     - `appendToDisplay(value)`: Appends the clicked button's value to the display.
     - `clearDisplay()`: Clears the display.
     - `calculate()`: Sends the expression to `calculate.php` via AJAX, receives the result, and displays it.

2. **Backend (PHP)**:
   - **calculate.php**:
     - Receives the expression from the client.
     - Sanitizes the expression to prevent security issues.
     - Uses `eval()` to compute the result of the expression.
     - Returns the result to the frontend.

This setup provides a functional basic calculator with a clean interface and responsive behavior using AJAX to handle calculations.

![Alt](https://repobeats.axiom.co/api/embed/11d829e9146763984c47a8932ca2800c26f4e067.svg "Repobeats analytics image")
