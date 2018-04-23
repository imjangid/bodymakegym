<?php
session_start();
include "../login_check.php";
include "../connect.php";
if(isset($_SESSION["user"])){
    $name =$_SESSION["user"];
    $data = mysqli_fetch_assoc(mysqli_query($conn,"select * from users where email='$name'"));
echo '
<!DOCTYPE html>
<html>

<head>
    <title>User detail</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <div class="center">
    <div class="name">'.$data["name"].'</div>
    <div class="fee">'.$data["fees"].'<span style="font-size: 2vw">due</span></div>
    <div class="pay">
        <button>PAY</button><br>
           <a href="../logout.php"> <button>LOGOUT</button></a>
    </div>
    </div>

    <script>

    
</script>
</body>

</html>';}
else{

   echo '<script type="text/javascript">location.href ="../login.php?error";</script>';
};