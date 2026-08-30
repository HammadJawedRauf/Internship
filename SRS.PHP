<?php
require 'data.php';

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

        $stmt = $con->prepare($sql);

        $stmt->execute([
            ':Sname' => $NAME,
            ':Mname' => $PHONE,
            ':Tname' => $DEPARTMENT,
            ':Dname' => $DOB,
            ':Rname' => $ROLLNO,
            ':status' => 'PENDING'

        ]);

        echo "<br>Student Registered successfully!";
        header("location:display.php");
    exit;
    }
}


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

    <fORM method = "POST" action="SRS.PHP" >
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
<button  class="btn" btn_primary> <a href="display.php" >Display</a></button>
</body>
</html>

