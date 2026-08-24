<?php
if ($_SERVER ["REQUEST_METHOD"] == "POST"){

if(isset($_POST['deletebtn'])){
$id=$_POST['STD_ID'];
$sql = "DELETE FROM student WHERE STD_ID = :id";

$stmt = $con->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

echo "<br>Student deleted successfully!";
}}?>
