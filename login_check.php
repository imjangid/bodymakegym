<?php
include "connect.php";
session_start();
if (isset($_POST["login_"])){

    $name = $_POST["username"];
    $pass = $_POST["password"];
    $form_mail = mysqli_fetch_assoc(mysqli_query($conn,"select * from users where email='$name'"));
    if($form_mail["password"]==$pass){
        session_start();
        $_SESSION["user"] = $name;
        $_SESSION["pass"] = $pass;
        if($form_mail["admin"]==0){
        echo '<script type="text/javascript">location.href ="user/index.php";</script>';
        }
        else{
         echo '<script type="text/javascript">location.href ="admin.php";</script>';
        }
    }
else{
    echo '<script type="text/javascript">location.href ="login.php?error";</script>';
}
}
if (isset($_SESSION["user"])){

    $name = $_SESSION["user"];
    $form_mail = mysqli_fetch_assoc(mysqli_query($conn,"select * from users where email='$name'"));
    if($form_mail["password"]==$_SESSION["pass"]){
        if($form_mail["admin"]==0){
            echo '<script type="text/javascript">location.href ="user/index.php";</script>';
        }
        else{
            echo '<script type="text/javascript">location.href ="admin.php";</script>';
        }
    }
    else{
        echo '<script type="text/javascript">location.href ="login.php?error";</script>';
    }
}
else{
    echo '<script type="text/javascript">location.href ="login.php";</script>';
}




























/**
 * Created by PhpStorm.
 * User: ashvi
 * Date: 20-04-2018
 * Time: 01:45 AM
 */