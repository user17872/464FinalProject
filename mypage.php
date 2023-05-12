<?php
function myFunction() {
    echo "Hello, world!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <button id="myButton">Click me</button>
    <script>
        $('#myButton').click(function() {
            $.ajax({
                url: 'myScript.php',
                type: 'post',
                data: {
                    'action': 'myFunction'
                },
                success: function(data) {
                    alert(data);
                }
            });
        });
    </script>
</body>
</html>
