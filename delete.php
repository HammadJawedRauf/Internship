<?php

require 'data.php';
$update=[];
$id=filter_input(INPUT_GET,'STD_ID');


$sql = "DELETE FROM student WHERE STD_ID = :id";

$stmt = $con->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

echo "<br>Student deleted successfully!";

header("Location:display.php");
exit;

?>


