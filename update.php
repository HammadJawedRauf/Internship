<?php
include 'SRS.PHP';
if(isset($_POST['updateBtn'])){

$NAME = readline("Enter Name To Update:" );
echo"name ".$NAME;
$ids = 2;
$ROLLNO = 114422;

$sqls = "UPDATE student
        SET NAME = :NAME , ROLLNO = :ROLLNO
        WHERE STD_ID = :ids";

$st = $con->prepare($sqls);

$st->execute([
    ':NAME' => $NAME,
    ':ROLLNO' => $ROLLNO,
    ':ids' => $ids
]);

echo "Student updated successfully!<br>";

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>