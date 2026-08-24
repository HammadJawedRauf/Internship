
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
    <label for="Text"><input type="checkbox" >Male</label>

    
    <label for="Text"> <input type="checkbox" >Female</label>
    
    
    <label for="Text"><input type="checkbox" >Other</label>
    

<button name ="register">Register</button>   

 
   
    
<!-- 
<label>To Create:</label>

    <input type="text" name="create" >

    <button type="submit" name="createBtn">
        Create
    </button> -->

    <label>To Read:</label>

    <input type="text" name="read" >

    <button type="submit" name="readBtn">
        Read
    </button>


    <label>To Update:</label>

    

    
    <input type="text" name="upd" >
    <button type="submit" name="updateBtn">
        Update
    </button>

    
    <label>Enter ID To Delete:</label>

    <input type="text" name="delete" >

    <button type="submit" name="deleteBtn">
        Delete</button> 

</form>

</body>
</html>







