<?php 

require 'data.php';

$id = filter_input(INPUT_GET, 'sf',FILTER_SANITIZE_FULL_SPECIAL_CHARS);



$row=[];
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

?>






