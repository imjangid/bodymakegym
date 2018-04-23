<?php
$url = "127.0.0.1";
$port = "3306";
$username = "root";
$password = "1234";
$dbname = "vijay";

$conn = new mysqli($url, $username, $password, $dbname, $port);

$users = array('The', 'following', 'example', 'creates', 'an', 'indexed', 'array', 'named', '$cars,', 'assigns', 'three', 'elements', 'to', 'it,', 'and', 'then', 'prints', 'a', 'text', 'containing', 'the', 'array', 'values:');

foreach ($users as $user) {
	$quary = "insert into test values('$user')";
	echo $quary . "<br>";
	mysqli_query($conn, $quary);
}

$data = mysqli_query($conn, "select * from test");
while ($row = mysqli_fetch_assoc($data)) {
	echo $row["name"] . "<br>";

}
