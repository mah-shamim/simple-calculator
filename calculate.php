<?php
/**
* Receives the expression from the client.
* Sanitizes the expression to prevent security issues.
* Uses eval() to compute the result of the expression.
* Returns the result to the frontend.
*/
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
