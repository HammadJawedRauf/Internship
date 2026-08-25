<?php
require 'data.php';

$id = filter_input(INPUT_POST, 'STD_ID');
$NAME = filter_input(INPUT_POST, 'Sname');
$ROLLNO = filter_input(INPUT_POST, 'Rname');
$PHONE = filter_input(INPUT_POST, 'Mname');
$DEPARTMENT = filter_input(INPUT_POST, 'Tname');
$DOB = filter_input(INPUT_POST, 'Dname');

$sqls = $con->prepare("
    UPDATE student
    SET 
        NAME = :NAME,
        ROLLNO = :ROLLNO,
        DEPARTMENT = :DEPARTMENT,
        PHONE = :PHONE,
        DOB = :DOB
    WHERE STD_ID = :id
");

$sqls->bindValue(':NAME', $NAME);
$sqls->bindValue(':ROLLNO', $ROLLNO);
$sqls->bindValue(':PHONE', $PHONE);
$sqls->bindValue(':DEPARTMENT', $DEPARTMENT);
$sqls->bindValue(':DOB', $DOB);
$sqls->bindValue(':id', $id);

$sqls->execute();

echo "Updated Successfully";
header("Location:display.php");
exit;
?>
