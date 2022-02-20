<?php
session_start();

if(!isset($_SESSION['access_token'])){
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title>My profile</title>
	<style>
		.solid {
   border-style: double;
  border-width: 10px;
  border-color: rgb(187, 187, 187); /* grey */
  border-radius: 12px;
  margin-top: 180px;
  margin-bottom: 100px;
  margin-right: 120px;
  margin-left: 120px;
  background-color: lightblue;
 }
 
 p {
  font-size: 18px;
  font-family: "Times New Roman", Times, serif;
}
	</style>
</head>
<body>
<div class= "solid">
<div class="container" style="margin-top: 100px">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<td><h6>ID</h6></td>
						<td><p><?php echo $_SESSION['userData']['id'] ?></p></td>
					</tr>
					<tr>
						<td><h6>First Name</h6></td>
						<td><p><?php echo $_SESSION['userData']['first_name'] ?></p></td>
					</tr>
					<tr>
						<td><h6>Last Name</h6></td>
						<td><p><?php echo $_SESSION['userData']['last_name'] ?></p></td>
					</tr>
					<tr>
						<td><h6>Email</h6></td>
						<td><p><?php echo $_SESSION['userData']['email'] ?><p></td>
					</tr>
				</tbody>
			</table>
			<!-- echo <h3><a href="logout.php">Logout</h3></div>';' -->
			<a href="logout.php"><input type="button" onclick="window.location.href = 'logout.php'" value="Logout with Facebook" class="btn btn-primary">
	<br><br>	</div>
	</div>
</div>
</div>
</body>
</html>