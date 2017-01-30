<?php

//database variables
include("db.php");
 
//SQL host, user, pass
@mysql_connect("$db_host","$db_username","") or die ("could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No database");

session_start();
$hashtag = $_POST['hashtag'];
$message = $_POST['message'] ;
$password = 0;


//create random, unique deletion key for message
do {
    $password = rand(100000, 999999);
    $get_passwords = mysql_query("SELECT * FROM submitted WHERE password = '$password' AND hashtag = '$hashtag'");
} while(mysql_num_rows($get_passwords)>0);

//insert data into SQL database
$sql = "INSERT INTO submitted (hashtag, message, password, time) VALUES ('$hashtag', '$message', '$password', NOW())";

if (!mysql_query($sql)) {
	die('Error: ' . mysql_error());
}

$sql = mysql_query("SELECT * FROM submitted WHERE hashtag = '$hashtag'");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
		<?php include("functions.htm");?>
	</head>
	<body>
		<!-- navigation bar -->
		<?php include("navbar.php");?>
		<div class="container">	
			<!--jumbotron-->
			<div class = "row">
				<div class = "jumbotron text-center">
					<?php
						if (mysql_num_rows($sql)==0){ 
    						echo '<h4 class = "lobster-font" >No results found for</h4>';
    					}
    					//else {
						//	echo '<h4 class = "lobster-font" >Search results for</h4>';
    					//} 
    				?>					
					<h1 class = "lobster-font" >#<?php echo $hashtag; ?></h1>
				</div>
			</div>
			<!--results list-->
			<div class="row">
				<?php
					while($row = mysql_fetch_array($sql)) {
		
						$id = $row["id"];
						$message = $row["message"];
						$time = $row["time"];
						echo '<div class= "col-md-8 col-md-offset-4" ><strong>' . $time . '</strong>: ' . $message . '</div>';
					};
				?>
			</div>
		
			<!--results list-->
			<div class="text-center" id="bottomOFThePage">
				<?php
					echo '<p> Unique key for message deletion: <strong>' . $password . '</strong></p>';
				?>
			</div>		

			<!-- "about" modal -->
			<?php include("about.php");?>
			<!--necessary for javascript and bootstrap-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</div>
		<!--footer/submission form-->
		<?php include("submitfooter.php");?>
	</body>
</html>

