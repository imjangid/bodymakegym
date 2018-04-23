<?php include "connect.php";
session_start();
include "valid_user.php";
echo '
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>User List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet prefetch" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet prefetch" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
    <link rel="stylesheet" href="css/user_list.css">


</head>';

$admin = false;
valid_user();

if ($admin) {

	echo '
<body>

  <h2>Fees Due</h2>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <table summary="GYM USER TABLE" class="table table-bordered table-hover dt-responsive">
        <caption class="text-center">USERS</caption>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Due Fees</th>
          </tr>
        </thead>
        <tbody>';

	if ($data = mysqli_query($conn, "select * from users where fees>0")) {
		while ($row = mysqli_fetch_assoc($data)) {
			echo "<tr><td>" . $row["name"] . '</td><td><a onclick="user_edit(this)">' . $row["email"] . "</a></td><td>" . $row["mobile"] . "</td><td>" . $row["fees"] . "</td></tr>";
		}
	} else {
		echo "error";
	}
	;

	echo '
        </tbody>
        <tfoot>
          <tr>
<!--             <td colspan="5" class="text-center">Data retrieved from <a href="http://www.infoplease.com/ipa/A0855611.html" target="_blank">infoplease</a> and <a href="http://www.worldometers.info/world-population/population-by-country/" target="_blank">worldometers</a>.</td> -->
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<p class="p">Designed By <a href="https://imjangid.github.io/" target="_blank"> Ashvini Jangid</a></p>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>



    <script  src="js/user_list.js"></script>
  <script>
      function user_edit(el) {
          var myWindow = window.open("edit_user.php?email="+el.innerText, "myWindow", "width=300,height=350,resizable=no,toolbar=no,menubar=no,location=no");
          myWindow.focus();
      }
  </script>




</body>

</html>';} else {
	echo '<script type="text/javascript">location.href ="login.php?error";</script>';

}
