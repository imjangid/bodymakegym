<?php
session_start();
include "../connect.php";
include "../valid_user.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trainer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">


</head>

<?php
$admin = false;
valid_user()
?>

<body>

    <div class="info">Trainer </div>

    <table class="dynamic-table">
        <caption>Table of Trainer</caption>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Fees</th>
            <th>E-mail</th>
            <th>Actions</th>
        </tr>

        <?php
        if($admin){
            $data = mysqli_query($conn,"select * from Trainer");
            $counter = 1;

            while ($row = mysqli_fetch_assoc($data)) {
                $name = explode(" ",$row["name"]);
                echo '<tr>
                        <td>' . $counter . '</td>
                        <td>'. $name[0] . '</td>';
           if(sizeof($name)>1){
               $s_name = $name[1];
           }
           else{
               $s_name = "";     }




                echo '<td>'.$s_name .'</td>
                        <td>'. $row["phone"].'</td>
                        <td>'. $row["fees"].'</td>
                        <td>'. $row["email"].' </td>
                        <td><button class="edit"> Edit</button ><button class="delete"> Delete</button></td >
                       </tr>';
                $counter += 1;
                }

        }
        else{

        }
        ?>



        <tr class="addition-row">
            <td>
                <button class="add-line">+</button>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="js/index.js"></script>

</body>

</html>
