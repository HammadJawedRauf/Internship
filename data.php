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
  catch(PDOException $e){
     echo "<br>Insert Error: " . $e->getMessage();
  }
}
elseif(isset($_POST['readBtn'])){
    
 $id=$_POST["read"];;
 $sql = "SELECT * FROM student WHERE STD_ID = :id"; 
 $stmt = $con->prepare($sql);
 $stmt->execute([':id' => $id]);
 $row = $stmt->fetch(PDO::FETCH_ASSOC);

// echo "<br>Student Name:".$row['NAME'];
// echo "<br>Student ROLLNO:".$row['ROLLNO'];
// echo "<br>Student PHONE:".$row['PHONE'];
// echo "<br>Student DEPARTMENT:".$row['DEPARTMENT'];
// echo "<br>Student DATE OF BIRTH:".$row['DOB'];



//  $sql = "SELECT * FROM student";
// $que = $con->query($sql);


//  $students = $que->fetchAll(PDO::FETCH_ASSOC);

 /*
    foreach ($students as $s) {
     echo "<br> Student Id: " .$s['STD_ID'] . "<br>";
     echo "Student Name:".$s['NAME'] . "<br>";
    echo "Student RollNo:".$s['ROLLNO'] . "<br>";
  echo "Student Department:".$s['DEPARTMENT'] . "<br>";
     echo "Student Date Of Birth:".$s['DOB'] . "<br>";
     echo "Student Phone:".$s['PHONE'] . "<br>";

}*/

$NAME=$row['NAME'];
$ROLLNO=$row['ROLLNO'];
$DEPARTMENT=$row['DEPARTMENT'];
$DOB=$row['DOB'];
$PHONE=$row['PHONE'];



echo '<tr> <th scope = "row">.$id.</th>
<td>'.$NAME.'</td>
<td>'.$ROLLNO.'</td>
<td>'.$DEPARTMENT.'</td>
<td>'.$DOB.'</td>
<td>'.$PHONE.'</td>

</tr>';
}

elseif(isset($_POST['updateBtn'])){
?>
<form method="POST">


    <label for="Text">Student ID</label>
    <input type="text" name="ID">
    <label for="Text">Student Name</label>
    <input type="text" name="NAME">
    <label for="text"">Student Roll No</label>
    <input type="text" name="ROLLNO">
    <label for="tel">Student Phone No</label>
    <input type="text" name="PHONE">
    <label for="Text"  >Choose Department </label>
   <SELECT name="DEPARTMENT"  >
   <OPTION VALUE=""></OPTION>
        <OPTION value="IT">IT</OPTION>
        <OPTION value="SE">SE</OPTION>
        <OPTION value="CS">CS</OPTION>
</SELECT>
<br><label for="Text">Student Date Of Birth</label>
    <input type="date" name="DOB">

    <button type="submit" name="updatedata" >
        Update
    </button>

</form>

<?php
}
elseif(isset($_POST['updatedata'])){
$NAME = $_POST["NAME"];
$ids = $_POST["ID"];
$ROLLNO = $_POST["ROLLNO"];
$DEPARTMENT = $_POST["DEPARTMENT"];
$PHONE = $_POST["PHONE"];

$sqls = "UPDATE student
        SET NAME = :NAME , ROLLNO = :ROLLNO , DEPARTMENT = :DEPARTMENT, PHONE = :PHONE
        WHERE STD_ID = :ids";

$st = $con->prepare($sqls);

$st->execute([
    ':NAME' => $NAME,
    ':ROLLNO' => $ROLLNO,
    ':ids' => $ids
]);

echo "Student updated successfully!<br>";
}


elseif(isset($_POST['deleteBtn'])){
$id = $_POST["delete"];

$sql = "DELETE FROM student WHERE STD_ID = :id";

$stmt = $con->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

echo "<br>Student deleted successfully!";
}
    ?>
<?php
if(isset($_POST['register'])){
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
<?php
}
}
?>