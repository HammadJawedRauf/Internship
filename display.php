
<?php


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
echo "Connection Failed" . $e->getMessage();
}
if ($_SERVER ["REQUEST_METHOD"] == "POST"){

if(isset($_POST['register'])){
$NAME="";
$ROLLNO="";
$PHONE="";
$DEPARTMENT="";
$DOB="";


$NAME=$_POST["Sname"];
$PHONE=$_POST["Mname"];
$DEPARTMENT=$_POST["Tname"];
$DOB=$_POST["Dname"];
$ROLLNO=$_POST["Rname"]; 


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

$sql = "SELECT * FROM student WHERE STD_ID = :id"; 
 $stmt = $con->prepare($sql);
 $stmt->execute([':id' => $id]);
 $row = $stmt->fetch(PDO::FETCH_ASSOC);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <button class="btn btn-primary my-5 "><a href="SRS.PHP" CLASS=text-light>Add Student</a></button>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">STD_ID</th>
      <th scope="col">NAME</th>
      <th scope="col">ROLLNO</th>
      <th scope="col">PHONE</th>
     <th scope="col">DEPARTMENT</th>
    <th scope="col">DOB</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td><?php echo "<br>Student ID:".$row['STD_ID'];?></td>
      <td><?php echo "<br>Student Name:".$row['NAME'];?></td>
      <td><?php echo "<br>Student RollNo:".$row['ROLLNO'];?></td>
      <td><?php echo "<br>Student Phone:".$row['PHONE'];?></td>
      
    </tr>
    
  </tbody>
</table>
</body>
</html>