<?php
include "connect.php";
include "thanks.html";
$query = "insert into query values('{$_POST['name']}','{$_POST['mail']}','{$_POST['sub']}','{$_POST['message']}')";
mysqli_query($conn, $query);