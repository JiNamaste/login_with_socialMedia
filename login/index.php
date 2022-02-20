<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> 

  <style type="text/css">
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
  font-size: 24px;
  font-family: "Times New Roman", Times, serif;
}

</style>



 
 </head>
 <body>





 <div class= "solid">
 <div class="container" style="margin-top: 100px">
	<div class="row justify-content-center">
		<div class="col-md-3">
		<?php echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />'; ?>
		</div>

		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<td><h3>Name<h3></td>
						<td><?php  echo '<p><b></b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</p>';      ?></td>
					</tr>
					<tr>
						<td><h3>Email<h3></td>
						<td><?php echo '<p><b></b> '.$_SESSION['user_email_address'].'</p>'; ?></td>
					</tr>
				</tbody>
			</table>
			<!-- echo <h3><a href="logout.php">Logout</h3></div>';' -->
			<a href="logout.php"><input type="button" onclick="window.location.href = 'logout.php'" value="Logout From Google" class="btn btn-primary"><br><br>
		</div>
	</div>
</div>
</div>
 </body>
</html>