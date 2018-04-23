<?php
include "../connect.php";
$query = str_replace("xcheck","=",$_GET["query"]);
mysqli_query($conn, $query);
echo $query;












/**
 * Created by PhpStorm.
 * User: ashvi
 * Date: 22-04-2018
 * Time: 04:01 PM
 */