<?php



class dbconnect{
private $con;
public function construct(){

$servername = "localhost";
$username = "root";
$dbname = "student_registration";
$password = "";

try {

     $this->con = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password
    );

   $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo "Connection Failed: " . $e->getMessage();
}
}
public function register(){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

btn{
   
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px;


}
label{
    display:block

}
body{
    display:flex;
justify-content: centre;
align-items:center;

}
form{
background: #a7b2e3;
display:block;
border-radius:25px;
padding:150px;
margin:center;
text:centre;
margin-left:450px;
padding:centre;
}

input:{

display:block;




}





</style>
<body>

    <fORM method = "POST" action="display.php" >
     <h1>Student Registration Form</h1>
   <label for="Name">Student Name</label>
   <input type="text" name="Sname"  required><br>  
   
   <label for="rollno">Student Roll No</label>
   <input type="text" name="Rname"  required><br>
   
   <label for="DOB">Student DOB</label>
   <input type="date" name="Dname"  required><br> 
   
   <label for="phone">Student Mobile No</label>
   <input type="tel" name="Mname"  required><br> 
   
   <label for="Text"  >Choose Department </label>
   <SELECT name="Tname" required >
   <OPTION VALUE=""></OPTION>
        <OPTION value="IT">IT</OPTION>
        <OPTION value="SE">SE</OPTION>
        <OPTION value="CS">CS</OPTION>
</SELECT><br>
    
   <label for="text">Gender</label>
    <label for="Text"><input type="checkbox" name="male">Male</label>

    
    <label for="Text"> <input type="checkbox" name="female">Female</label>
    
    
    <label for="Text"><input type="checkbox" name="other">Other</label>
    

<button name ="register" >Register</button>   
  
</form>
<button  class="btn" btn_primary> <a href="display.php" >Display</a>
</button>
</body>
</html>



<?php
}
public function Display(){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['register'])) {

        $NAME = $_POST["Sname"];
        $PHONE = $_POST["Mname"];
        $DEPARTMENT = $_POST["Tname"];
        $DOB = $_POST["Dname"];
        $ROLLNO = $_POST["Rname"];
       

        $sql = "INSERT INTO student
                (NAME, ROLLNO, PHONE, DEPARTMENT, DOB ,STATUS)
                VALUES (:Sname, :Rname, :Mname, :Tname, :Dname, :status )";

        $stmt =$this->con->prepare($sql);

        $stmt->execute([
            ':Sname' => $NAME,
            ':Mname' => $PHONE,
            ':Tname' => $DEPARTMENT,
            ':Dname' => $DOB,
            ':Rname' => $ROLLNO,
            ':status' => 'PENDING'

        ]);

        echo "<br>Student Registered successfully!";
    }
}


$sql = "SELECT * FROM student";
$stmt = $this->con->query($sql);

$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>




<div class="table-container">
  <h1>Student Table</h1>

  <button class="adds">
    <a href="SRS.PHP">Add Student</a>
</button>

<form action="Search_Filter.php" method="GET" class="search-form">

    <input
        type="text"
        name="sf"
        placeholder="Enter Student Credential"
        required
    >

    <button type="submit">
        Search ID
    </button>
    

</form><table>
  

<tr>
    <th>STD_ID</th>
    <th>NAME</th>
    <th>ROLLNO</th>
    <th>PHONE</th>
    <th>DEPARTMENT</th>
    <th>DOB</th>
    <th>ACTION</th>
    <th>STATUS</th>
</tr>


<?php foreach ($row as $r) { ?>

<tr>

    <td><?php echo $r['STD_ID']; ?></td>

    <td><?php echo $r['NAME']; ?></td>

    <td><?php echo $r['ROLLNO']; ?></td>

    <td><?php echo $r['PHONE']; ?></td>

    <td><?php echo $r['DEPARTMENT']; ?></td>

    <td><?php echo $r['DOB']; ?></td>


    <td>

        <button class="blue-button">
            <a href="delete.php?STD_ID=<?=$r['STD_ID'];?>">
                Delete
            </a>
        </button>

        <button class="blue-button">
            <a href="update.php?STD_ID=<?=$r['STD_ID'];?>">
                Update
            </a>
        </button>

    </td>


    <td>

        <?php if ($r['STATUS'] == 'APPROVED') { ?>

            <a class="green-button"
               href="status.php?STD_ID=<?=$r['STD_ID'];?>&STATUS=PENDING">
                Approved
            </a>

        <?php } else { ?>
            <a class="red-button"
               href="status.php?STD_ID=<?=$r['STD_ID'];?>&STATUS=APPROVED">
                Pending
            </a>

        <?php } ?>

    </td>

</tr>

<?php } ?>

</table>
</div>

<br>



<style>

.adds {
display: block;
/* margin: 1px auto; */
padding: 7px;
/* margin-right:20%;
margin: 20px auto 0; */
margin-left:5%;
/* margin-top:2%; */
margin-bottom:-4%;
margin-top:5%;

}
.adds a{
  color: black;
    text-decoration: none;
text-align: left;

}
.blue-button {
    background-color: blue;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

.blue-button a {
    color: white;
    text-decoration: none;
}

.red-button {
    display: inline-block;
    background-color: red;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

.green-button {
    display: inline-block;
    background-color: green;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
}

th {
    background-color: #333;
    color: white;
    padding: 12px;
    text-align: center;
}

td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

h1 {
    text-align: center;
    font-family: Arial, sans-serif;
}
.search-form {
   width: 100%;
    display: flex;
    justify-content: flex-end;
    margin-right: 25%;
    margin-top:-3%;
}

.search-form input {
    padding: 10px;
    width: 250px;


  }

.search-form button {
    padding: 10px 20px;
    background-color: blue;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 5%;
    

}

.table-container {
    width: 100%;
    margin: 30px auto;
    
}

</style>

<?php}


public function update(){
    $update=[];
$id=filter_input(INPUT_GET,'STD_ID');

if($id){

$sql=$this->con->prepare("SELECT * FROM student WHERE STD_ID = :id");
$sql->bindValue(':id',$id);
$sql->execute();

if($sql->rowcount()>0){

$update=$sql->fetch(PDO::FETCH_ASSOC);

}


else{
    header("location:SRS.PHP");
    exit;

}



}else{
    header("location:SRS.PHP");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

label{
    display:block

}
body{
    display:flex;
justify-content: centre;
align-items:center;

}
form{
background: #a7b2e3;
display:block;
border-radius:25px;
padding:150px;
margin:center;
text:centre;
margin-left:450px;
padding:centre;
}

input:{

display:block;




}





</style>
<body>

    <fORM method = "POST" action="update_action.php" >
     <h1>Student Registration Form</h1>


   <label for="Name">Student Name</label>
   <input type="hidden" name="STD_ID" value="<?=$update['STD_ID']; ?>" required><br>  
   
   <input type="text" name="Sname" value="<?=$update['NAME']; ?>" required><br>  
   
   <label for="rollno">Student Roll No</label>
   <input type="text" name="Rname" value="<?=$update['ROLLNO']; ?>" required><br>
   
   <label for="DOB">Student DOB</label>
   <input type="date" name="Dname" value="<?=$update['DOB']; ?>" required><br> 
   
   <label for="phone">Student Mobile No</label>
   <input type="tel" name="Mname" value="<?=$update['PHONE']; ?>" ><br> 
   
   <label for="Text"  >Choose Department </label>
   <select name="Tname" required>
    <option value="">Select Department</option>
    <option value="IT" <?=($update['DEPARTMENT'] == 'IT') ? 'selected' : ''?>>IT</option>
    <option value="SE" <?=($update['DEPARTMENT'] == 'SE') ? 'selected' : ''?>>SE</option>
    <option value="CS" <?=($update['DEPARTMENT'] == 'CS') ? 'selected' : ''?>>CS</option>
</select><br>
    
   <label for="text">Gender</label>
    <label for="Text"><input type="checkbox" >Male</label>

    
    <label for="Text"> <input type="checkbox" >Female</label>
    
    
    <label for="Text"><input type="checkbox" >Other</label>
    

<button name ="updatedata">UPDATE</button>   
</form>

</body>
</html>

<?php}

public function updateaction(){
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
<?php}

public function delete(){
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


<?php
}

public function status(){
    $id = filter_input(INPUT_GET, 'STD_ID');
$status = filter_input(INPUT_GET, 'STATUS');

if ($id && $status) {

    $sql = "UPDATE student 
            SET STATUS = :status 
            WHERE STD_ID = :id";

    $stmt = $con->prepare($sql);

    $stmt->execute([
        ':status' => $status,
        ':id' => $id
    ]);
}

header("Location: display.php");
exit;
}
public function search_fiter(){
    $id = filter_input(INPUT_GET, 'sf',FILTER_SANITIZE_FULL_SPECIAL_CHARS);



if ($id !== null && $id !== '') {
    $sql = "SELECT * FROM student 
              WHERE STD_ID LIKE :id
            OR NAME LIKE :id
            OR ROLLNO LIKE :id
            OR PHONE LIKE :id
            OR DEPARTMENT LIKE :id
            OR DOB LIKE :id
            OR STATUS LIKE :id";

     $stmt = $con->prepare($sql);
  $stmt->execute([
        ':id' => "%$id%"
    ]); 
 $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(!$row){
    echo"<br>Enter Valid ID";}
else{
?>
<h1>Student Table</h1>
<button  class="btn" btn_primary> <a href="display.php" >Display All</a></button>

<table >
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
  <?php  foreach($row as $r){?>
  <tr><td><?php echo$r['STD_ID'];?></td>
  <td><?php echo$r['NAME'];?></td>
  <td><?php echo$r['ROLLNO'];?></td>
<td><?php echo$r['PHONE'];?></td>
<td><?php echo$r['DEPARTMENT'];?></td>
<td><?php echo$r['DOB'];?></td>
<td> 
    <button style="background-color: blue; text-color: white;"class="blue-button"><a style="color: white;" href="delete.php?STD_ID=<?=$r['STD_ID'];?>" >Delete</a></button>
    <button style="background-color: blue; text-color: white;" class="blue-button"><a style="color: white;"href="update.php?STD_ID=<?=$r['STD_ID'];?>">Update</a>
</button>

</td>
<td>
 

      <?php if ($r['STATUS'] == 'APPROVED') { ?>

            <a class="green-button"
               href="status.php?STD_ID=<?=$r['STD_ID'];?>&STATUS=PENDING">
                Approved
            </a>

        <?php } else { ?>

            <a class="red-button"
               href="status.php?STD_ID=<?=$r['STD_ID'];?>&STATUS=APPROVED">
                Pending
            </a>

        <?php } ?>
</td></tr>
<?php }?>
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
table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    }
th {
    background-color: #333;
    color: white;
    padding: 12px;
    text-align: center;
}

td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ccc;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
h1 {
    text-align: center;
    font-family: Arial, sans-serif;
    margin-top: 30px;
}
</style>

<?php

}}
else{
    echo"<br>Enter Valid Input";
}

}
}
 $SRS=new dbconnect();
  $SRS->construct();
  $SRS->register();











?>