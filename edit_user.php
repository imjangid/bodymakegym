<?php
include "connect.php";
$quary = "select * from users where email = '{$_GET["email"]}'";
$data = mysqli_fetch_array(mysqli_query($conn,$quary));
$show = true;
$disp = "User Detail";
if(isset($_POST["action"])){

if($_POST["action"]=="Update"){
    $update = "update users set name='{$_POST["username"]}',email='{$_POST["email"]}',father_name='{$_POST["fathername"]}',address='{$_POST["address"]}',mobile={$_POST["mobile"]},password='{$_POST["password"]}' where email= '{$_GET["email"]}'";
    mysqli_query($conn, $update);
    $show = false;
    $disp = 'UPDATED <br><button onclick="CloseME()">Close</button>';
}

if($_POST["action"]=="Delete"){
    $del = "delete from users where email='{$_GET["email"]}'";
    mysqli_query($conn,$del);
    $show = false;
    $disp = "Deleted <br><button onclick='CloseME()'>Close</button>";
}}
$quary = "select * from users where email = '{$_GET["email"]}'";
$data = mysqli_fetch_array(mysqli_query($conn,$quary));
$close = false;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            overflow: hidden;
            background-color: #00DBA6;
            text-align: center;
        }
        br{
            margin-top: 20px;
        }
        .center{

            position: absolute;
            margin-left: 50%;

        }
        form{
            transform: translate(-50%,0);
        }
        input{
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>
<body>
<?php
    echo $disp;
    if($show){
    echo '<div class="center"><form action="" method="post">';
    echo '<input type="text" name="username" placeholder="Full Name" pattern="[\w\s]*" value="'.$data["name"] .'"required/><br>';
    echo '<input type="email" name="email" placeholder="Email Address" value="'.$data["email"] .'"required/><br>';
    echo 'father: <input type="text" name="fathername" placeholder="Fathers Name" pattern="[\w\s]*" value="'.$data["father_name"] .'"required/><br>';
    echo '<input type="text" name="address" placeholder="Address" pattern="(\w)+" value="'.$data["address"] .'"required/><br>';
    echo '<input type="text" name="mobile" placeholder="Mobile" pattern="(\d){10}" value="'.$data["mobile"] .'"required/><br>';
    echo 'pass : <input type="text" name="password" placeholder="password" value="'.$data["password"] .'"required/><br>';
    echo '<input type="submit" name="action" value="Update">';
    echo '<input type="submit" name="action" value="Delete">';
    echo '</form></div>';}
    ?>
<script>
function CloseME() {
    window.opener.location.reload();
    window.close();
}

</script>
</body>
</html>
