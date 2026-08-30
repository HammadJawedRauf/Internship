<?php

require 'data.php';
$sql = "SELECT * FROM student";
$stmt = $con->query($sql);

$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
$id = filter_input(INPUT_GET, 'sf',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($id == 'All') {

$sql = "SELECT * FROM student";
$stmt = $con->query($sql);

$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



else if ($id !== null && $id !== '') {
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
}

?>




<div class="table-container">
  <h1>Student Table</h1>

  <button class="adds">
    <a href="SRS.PHP">Add Student</a>
</button>

<form action="display.php" method="GET" class="search-form">

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

<?php  }?>

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
