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
$dbname="store_employee";
$password = "";

try{
    $con = new PDO("mysql:host=$servername;dbname=$dbname",$username,$dbname);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo"Connected successfully!";

}
catch(PDOException $e){
echo "Connection Failed" . $e->getmessage();
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
<p><?php echo"Student Name:".$NAME; ?></p><br>

<p><?php echo"Student RollNo:".$ROLLNO; ?></p><br>

<p><?php echo"Student Phone:".$PHONE; ?></p><br>

<p><?php echo"Student Dath Of Birth:".$DOB; ?></p><br> 

<p><?php echo"Student Department:".$DEPARTMENT; ?></p><br> 

    

</body>
</html>