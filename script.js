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
