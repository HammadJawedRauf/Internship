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
}

}

$row=[];
$sql = "SELECT * FROM student"; 
 $stmt = $con->query($sql);
 if($stmt->rowcount() > 0){
 $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<h1>Student Table</h1>
<table border="1">
  <tr>
      <th >STD_ID</th>
      <th >NAME</th>
      <th >ROLLNO</th>
      <th >PHONE</th>
     <th >DEPARTMENT</th>
    <th >DOB</th>
    <th >ACTION</th>
    <th>STATUS</th>
</tr>
  <?php foreach($row as $r){?>
  <tr><td><?php echo$r['STD_ID'];?></td>
  <td><?php echo$r['NAME'];?></td>
  <td><?php echo$r['ROLLNO'];?></td>
<td><?php echo$r['DEPARTMENT'];?></td>
<td><?php echo$r['DOB'];?></td>
<td><?php echo$r['PHONE'];?></td>
<td> 
    <button style="background-color: blue; text-color: white;"class="blue-button"><a style="color: white;" href="delete.php?STD_ID=<?=$r['STD_ID'];?>" >Delete</a></button>
    <button style="background-color: blue; text-color: white;" class="blue-button"><a style="color: white;"href="update.php?STD_ID=<?=$r['STD_ID'];?>">Update</a>
</button>

</td>
<td>
 <?phpif(isset($_POST['app_btn'])){ ?>  
<button style="background-color: red; color: white;" class="red-button"><a name = "app_btn" href="display.php?STD_ID=<?=$r['STD_ID'];?>"class="a" >Pending</a></button>

 <?php }?>

 <button style="background-color: green; text-color: white;" class="green-button"><a name = "app_btn"href="display.php?STD_ID=<?=$r['STD_ID'];?>" class="a" >Approved</a></button>
</td></tr>
<?php  ?>
<button><a style ="color:black;"href="SRS.PHP" >Add Student</a></button>
</table>
 <style>
    .blue-button {
            background-color: blue;
            color: white; /* Makes the text white so it's easy to read */
            border-radius:20% ;  /* Removes the default border */
            padding: 10px 20px; /* Adds space around the text */
            cursor: pointer; /* Changes mouse cursor to a pointer */
            color:white;
        }
        .red-button {
            background-color: red;
            color: white; /* Makes the text white so it's easy to read */
            border-radius:20% ;  /* Removes the default border */
            padding: 10px 20px; /* Adds space around the text */
            cursor: pointer; /* Changes mouse cursor to a pointer */
        }
.green-button {
            background-color: green;
            color: white; /* Makes the text white so it's easy to read */
            border-radius:20% ;  /* Removes the default border */
            padding: 10px 20px; /* Adds space around the text */
            cursor: pointer; /* Changes mouse cursor to a pointer */
            color:white;
        }
        .a{
            color:white;
        }

</style>
