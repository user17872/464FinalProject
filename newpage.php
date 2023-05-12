<script>

    var p1 = "success";

    function myfunction(te){
        alert(te);
        var p1 = "successNEW";
    }
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>



<?php
$te = 12;

echo "<form type = 'post'>";
echo "<input type = 'submit' name = 'submit' onclick = 'myfunction($te)' ";
echo "</form>";
echo "<input type = 'text' value = '<script>document.writeln(p1);</script>' >";
echo "<script>document.writeln(p1);</script>";
?>