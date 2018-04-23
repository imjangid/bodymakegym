<?php include 'connect.php';
$date = "{$_POST['YY']}-{$_POST['MM']}-{$_POST['DD']}";
$sex = true;
if (!$_POST['gender'] == "male") {
	$sex = false;}
$query = "insert into users values('{$_POST['username']}','{$_POST['email']}','{$_POST['fathername']}','{$_POST['address']}',{$_POST['mobile']},'{$_POST['password']}','$date',$sex,0,400,0)";
echo $query;
mysqli_query($conn, $query);
if (mysqli_errno($conn) == 1062) {
	echo "<script>alert('User already Exists');window.location.href = 'login.php'; </script>";
} else {
	echo "<script>window.location.href = 'thanks.html'; </script>";
}
