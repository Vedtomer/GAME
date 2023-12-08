<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
</head>
<body>

    <form id="myForm">
        <!-- Initial input -->
        <label for="initialValue">Enter the first value:</label>
        <input type="text" id="initialValue" name="initialValue" required oninput="updateValues()">
        <br>

        <!-- Next five inputs using the initial value -->
        <label for="input2">Value for input 2:</label>
        <input type="text" id="input2" name="input2" readonly>
        <br>

        <label for="input3">Value for input 3:</label>
        <input type="text" id="input3" name="input3" readonly>
        <br>

        <label for="input4">Value for input 4:</label>
        <input type="text" id="input4" name="input4" readonly>
        <br>

        <label for="input5">Value for input 5:</label>
        <input type="text" id="input5" name="input5" readonly>
        <br>

        <label for="input6">Value for input 6:</label>
        <input type="text" id="input6" name="input6" readonly>
        <br>

        <label for="input7">Value for input 7:</label>
        <input type="text" id="input7" name="input7" readonly>
    </form>

    <script>
        function updateValues() {
            // Get the initial value from the first input
            var initialValue = document.getElementById("initialValue").value;

            // Use the initial value in the next five inputs
            for (var i = 2; i <= 7; i++) {
                document.getElementById("input" + i).value = initialValue;
            }
        }
    </script>

</body>
</html>
