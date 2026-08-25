<?php
require 'data.php';
$update=[];
$id=filter_input(INPUT_GET,'STD_ID');

if($id){

$sql=$con->prepare("SELECT * FROM student WHERE STD_ID = :id");
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






