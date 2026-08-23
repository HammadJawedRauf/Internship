<?php
$NAME="";
$ROLLNO="";
$PHONE="";
$DEPARTMENT="";
$DOB="";

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
$NAME=$_POST["Sname"];
$PHONE=$_POST["Mname"];
$DEPARTMENT=$_POST["Tname"];
$DOB=$_POST["Dname"];
$ROLLNO=$_POST["Rname"];

}

$servername = "localhost";
$username = "root";
$dbname="student_registration";
$password = "";

try{
    $con = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo"Connected successfully!";

}
catch(PDOException $e){
echo "Connection Failed" . $e->getmessage();
}
if ($_SERVER ["REQUEST_METHOD"] == "POST"){
$NAME=$_POST["Sname"];
$PHONE=$_POST["Mname"];
$DEPARTMENT=$_POST["Tname"];
$DOB=$_POST["Dname"];
$ROLLNO=$_POST["Rname"];

try{

$sql="Insert Into student (NAME,
ROLLNO,
PHONE,
DEPARTMENT,
DOB
)
values(:Sname,:Rname,:Mname,:Tname ,:Dname)";
$stmt = $con->prepare($sql);

$stmt->execute([
':Sname'=> $NAME,
':Mname'=>$PHONE,
':Tname'=>$DEPARTMENT,
':Dname'=>$DOB,
':Rname'=>$ROLLNO,
]);
 echo "<br>Student Registered successfully!";
}
  catch(PDOError $e){
     echo "<br>Insert Error: " . $e->getMessage();
  }
    }
$id=29;
$sql = "SELECT * FROM student WHERE STD_ID = :id"; 
$stmt = $con->prepare($sql);
$stmt->execute([':id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<br>".$row['PHONE'];

$sql = "SELECT * FROM student";
$que = $con->query($sql);


 $students = $que->fetchAll(PDO::FETCH_ASSOC);

 
   foreach ($students as $s) {
    echo "<br> Student Id: " .$s['STD_ID'] . "<br>";
    echo "Student Name:".$s['NAME'] . "<br>";
    echo "Student RollNo:".$s['ROLLNO'] . "<br>";
    echo "Student Department:".$s['DEPARTMENT'] . "<br>";
    echo "Student Date Of Birth:".$s['DOB'] . "<br>";
}
$ids = 40;
$NAME = 'Ahmad';
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

echo "Employee updated successfully!<br>";
$id = 30;

$sql = "DELETE FROM student WHERE STD_ID = :id";

$stmt = $con->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

echo "Employee deleted successfully!";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php echo"Student Name:".$NAME; ?></p><br>

<p><?php echo"Student RollNo:".$ROLLNO; ?></p><br>

<p><?php echo"Student Phone:".$PHONE; ?></p><br>

<p><?php echo"Student Dath Of Birth:".$DOB; ?></p><br> 

<p><?php echo"Student Department:".$DEPARTMENT; ?></p><br> 

    

</body>
</html>
