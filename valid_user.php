<?php
include "connect.php";
function valid_user(){
    global $conn,$admin;
    $email = $_SESSION["user"];
    $user_data = mysqli_fetch_assoc(mysqli_query($conn,"select * from users where email='$email'"));
    if(sizeof($user_data)>0){
    if($user_data["admin"]==1){
        $admin = true;
    }
    else{
        $admin = false;
    }
}}





























/**
 * Created by PhpStorm.
 * User: ashvi
 * Date: 20-04-2018
 * Time: 02:48 AM
 */