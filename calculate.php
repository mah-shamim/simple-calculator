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
