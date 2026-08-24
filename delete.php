<?php
if ($_SERVER ["REQUEST_METHOD"] == "POST"){
if(isset($_POST['register'])){
?>
<table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Department</th>
        <th>Action</th>
    </tr>

    <?php foreach ($students as $student) { ?>

       <div></div> <tr>

            <td><?php echo $student['STD_ID']; ?></td>

            <td><?php echo $student['NAME']; ?></td>

            <td><?php echo $student['ROLLNO']; ?></td>

            <td><?php echo $student['DEPARTMENT']; ?></td>

            <td>

                <form method="POST">

                    <input
                        type="hidden"
                        name="delete"
                        value="<?php echo $student['STD_ID']; ?>"
                    >

                    <button type="submit" name="deleteBtn">
                        Delete
                    </button>

                </form>

            </td>

        </tr>
</div>
    <?php }}} ?>

</table>