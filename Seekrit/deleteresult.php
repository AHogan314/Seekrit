<?php

//database variables
include("db.php");
 
//SQL host, user, pass
@mysql_connect("$db_host","$db_username","") or die ("could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");

session_start();
$hashtag = $_POST['hashtag'];
$password = $_POST['password'];


$sql = "DELETE FROM submitted WHERE hashtag='$hashtag' AND password='$password'";
$hashtagCheck = mysql_query("SELECT * FROM submitted WHERE hashtag='$hashtag' AND password='$password'");


if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}

mysql_close();

?>

<!DOCTYPE html>

	<html>
		<head>
			<title>delete confirmation</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
			<link href = "css/bootstrap.min.css" rel = "stylesheet">
			<link href = "css/styles.css" rel = "stylesheet">
			<!--redirect-->
			<meta http-equiv="refresh" content="10; url=index.php" />
		</head>

		<body>
		<!-- navigation bar -->
		<?php include("navbar.php");?>
		<div class="container">	
			<!--jumbotron-->
			<div class = "row">
				<div class = "jumbotron text-center">
					<?php
						if (mysql_num_rows($hashtagCheck)==0){ 
    						echo '<h4 class = "lobster-font" >Error: invalid hashtag or message key.</h4>';
    					}
    					else {
    						echo '<h4 class = "lobster-font" >Your message in #' . $hashtag . ' has been deleted.</h4>';
    					}
    				?>					
				</div>
			</div>
			
			<!-- "about" modal -->
			<?php include("about.php");?>
			<!--necessary for javascript and bootstrap-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</div>
		<!--footer/submission form-->
		<?php include("footer.php");?>
	</body>
</html>

