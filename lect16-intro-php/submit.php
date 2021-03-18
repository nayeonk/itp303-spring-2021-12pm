<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Intro to PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Intro to PHP</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">

			<h2 class="col-12 mt-4 mb-3">PHP Output</h2>

			<div class="col-12">
<!-- Display Test Output Here -->

<?php
	// Write PHP here
	
	echo "Hello World!";
	echo "<strong>Hello World!</strong>";
	echo "<hr>";

	// Variables
	$name = "Tommy";
	$age = 5;
	echo $name;

	echo "<hr>";

	// var_dump is like echo, it prints. but it also tells you the data type and length 
	var_dump($name);

	echo "<hr>";

	// Concatenation - period (not a plus sign like other languages)
	echo "My name is " . $name;

	echo "<hr>";
	// When using double quotes, can utilize variable interpolation and do something like this:
	echo "My name is $name";

	echo "<hr>";
	// With single quotes, the literal variable name shows
	echo 'My name is $name';

	// DATE/TIME in PHP

	// Set a default timezone
	date_default_timezone_set('America/Los_Angeles');

	echo "<hr>";
	// Get the current time
	echo date("m-d-y H:i:s T");

	// Arrays
	$colors = ["red", "blue", "green"];
	echo "<hr>";
	echo $colors[0];
	echo "<hr>";

	for($i = 0; $i < sizeof($colors); $i++) {
		echo $colors[$i] . ", ";
	}

	echo "<hr>";
	// var_dump can print out arrays so it's useful when working with lots of arrays and you want to quickly see what's in the array
	var_dump($colors);

	// Associative arrays - it is an array with STRING KEYS
	// left hand is keys, right hand is the value
	$courses = [
		"ITP 303" => "Full-Stack Web Development",
		"ITP 404" => "Advanced Front-End Web Development"
	];

	echo "<hr>";
	echo $courses["ITP 303"];
	echo "<hr>";

	// Print out all the values in associatve array
	foreach($courses as $courseNumber => $courseName) {
		echo $courseNumber . ": " . $courseName;
		echo "<br>";
	}

	echo "<hr>";
	// Print out only the VALUES
	foreach($courses as $course) {
		echo $course;
		echo "<br>";
	}

	// SUPERGLOBALS
	echo "<hr>";
	var_dump($_SERVER);
	echo "<hr>";
	// Can get a specific value from $_SERVER
	echo $_SERVER["HTTP_SEC_CH_UA"];
	echo "<hr>";
	echo $_SERVER["HTTP_USER_AGENT"];

	// Other super globals: $_POST and $_GET

	echo "<hr>";
	echo "GET superglobal: ";
	var_dump($_GET);

	echo "<hr>";
	echo "POST superglobal: ";
	var_dump($_POST);
?>



			</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">

			<h2 class="col-12 mt-4">Form Data</h2>

		</div> <!-- .row -->

		<div class="row mt-3">
			<div class="col-3 text-right">Name:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				
				<?php
					if( isset($_POST["name"]) && !empty($_POST["name"])) {
						echo $_POST["name"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Email:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["email"]) && !empty($_POST["email"])) {
						echo $_POST["email"];
					}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>
				
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Current Student:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Subscribe:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				
				<?php
					if( isset($_POST["subscribe"]) && !empty($_POST["subscribe"])) {
								echo $_POST["subscribe"];
							} 
						foreach($_POST["subscribe"] as $subsrcibe) {
							echo $subsrcibe . ",";
						}
					else {
						echo "<div class='text-danger'>Not provided.</div>";
					}
				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Subject:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Message:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				
			</div>
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<a href="form.php" role="button" class="btn btn-primary">Back to Form</a>
		</div> <!-- .row -->

	</div> <!-- .container -->
	
</body>
</html>