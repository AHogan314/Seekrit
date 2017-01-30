<!DOCTYPE html>
	<html>
		<head>
			<title>seekr.it</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
			<link href = "css/bootstrap.min.css" rel = "stylesheet">
			<link href = "css/styles.css" rel = "stylesheet">
			<?php include("functions.htm");?>
		</head>
		<body>
			<!-- navigation bar -->
			<?php include("navbar.php");?>
			<!-- this div controls body width below the nav bar; without it margins and scroll bars are odd/erratic -->
			<div class="container">	
				<!-- Jumbotron -->
				<?php include("jumbotron.php");?>
				<!--submit/search panes-->
				<?php include("searchform.htm");?>
				<!-- "about" modal -->
				<?php include("about.php");?>
				<!--necessary for javascript and bootstrap-->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			</div>
			<?php include("footer.php");?>
		</body>
	</html>