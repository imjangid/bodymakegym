<?php
include "connect.php";
$solved = false;
if (isset($_POST["solved"])) {
	$solved = true;
	mysqli_query($conn, "delete from query where email='{$_GET["email"]}'");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Query</title>
	<style>

		body,html{
			font-size: 40px;
		}
		input{
			font-size: 40px;
			margin-left: 50px;
			background-color: aqua;
			border: 0;
			box-shadow: 2px 2px 4px black;

		}
		input:hover{
			box-shadow: 2px 2px 4px gray;
			cursor: pointer;
		}
	</style>

</head>
<body>
<?php
if (!$solved) {
	$data = mysqli_fetch_assoc(mysqli_query($conn, "select * from query where email='{$_GET["email"]}'"));
	if ($data) {

		echo $data["name"] . "<hr>" . $data["subject"] . "<hr>" . $data["Text"] . "<hr>" . $data["email"];
		echo '<form action="" method="post">';
		echo '<input type="hidden" name="temp"><br>';
		echo '<input type="submit" name="solved" value="solved"></form>';} else {
		echo "<script>window.close()</script>";
	}
} else {
	echo "<script>window.close()</script>";
}
?>

</body>
</html>