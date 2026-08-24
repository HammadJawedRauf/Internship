<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "post" action="data.php"> 
        <button type = "submit" name= "delete"> Delete</button>

</form>

</body>
</html>

<form method="POST">


                <input
                    type="hidden"
                    name="id"
                    value="<?php echo $student['STD_ID']; ?>"
                >

                <button type="submit" name="delete">
                    Delete
                </button>


            </form>

        </td>

    </tr>



</table>

</body>

</html> 