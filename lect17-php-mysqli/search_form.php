<?php
	
// ---- STEP 1: Establish a DB connection
$host = "303.itpwebdev.com";
$user = "nayeon_db_user";
$password = "uscItp2021!";
$db = "nayeon_song_db";

// To use the mysqli extension, first create an instance of the mysqli class
// The second this instance is created, mysqli is going to attempt to connect to this db using these credentials
$mysqli = new mysqli($host, $user, $password, $db);

// connect_errno returns the error code from the last db connection call
// if no error, connect_errno will return 0 (false)
if( $mysqli->connect_errno) {
	// There was an error, so let's display the actual error message
	echo $mysqli->connect_error;
	// exit() terminates the php program. No subsequent code runs
	exit();
}

// No errors? just continue the code

// ---- STEP 2: Generate & Submit SQL query
$sql = "SELECT * FROM genres;";
// Echo out sql statements just to double check that your statement is correct
echo "<hr>" . $sql . "<hr>";

// Can run as many sql queries as you'd like, just make another variable
$sql_media_types = "SELECT * FROM media_types;";


// Submit this sql query to the db!
// query() method submit the query to the db AND it will return results so need to create a variable to store the result
$results = $mysqli->query($sql);

// Can run as many sql queries as you'd like, just make another variable
$results_media_types = $mysqli->query($sql_media_types);

// quickly see dump out the results
var_dump($results);

// Check for any SQL or result errors when we get results back. $mysqli->query() will return fALSE if there were any errors with the query or submitting the query
if( !$results) {
	// display the error message
	echo $mysqli->error;
	// Termintate the program. No subsequent code runs.
	exit();
}

// ---- STEP 3: Display Results
echo "<hr>";
echo "Number of rows: " . $results->num_rows;
echo "<hr>";

// fetch_assoc() returns the first result as an associative array
// var_dump( $results->fetch_assoc() );

// To see ALL results, not just the first one, we need to run a loop 
// fetch_assoc() will return FALSE when it reaches the end of all the results
// while( $row = $results->fetch_assoc() ) {
// 	var_dump($row);
// 	// can put if/else statmenet to get a specific result
// 	echo $row["name"];
// 	echo "<hr>";
// }

// After reaching the end of the results, running fetch_assoc() again will return nothing. You have reached the end of the results
//$results->fetch_assoc();


// ---- STEP 4: Close the db connection
$mysqli->close();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		.form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Song Search Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">

		<form action="search_results.php" method="GET">

			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Track Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name-id" name="track_name">
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
				<div class="col-sm-9">
<select name="genre" id="genre-id" class="form-control">
	<option value="" selected>-- All --</option>

	<!-- <option value='1'>Rock</option>
	<option value='2'>Jazz</option>
	<option value='3'>Metal</option>
	<option value='4'>Alternative & Punk</option>
	<option value='5'>Rock And Roll</option> -->

	<?php
	 	// This works but gets really messy becuse mixing php and html together
		// while( $row = $results->fetch_assoc()) {
		// 	echo "<option value='". $row["genre_id"] . "'>" . $row["name"] . "</option>";
		// }
	?>
	<!-- The alternative syntax -->
	<?php while( $row = $results->fetch_assoc() ) :?>

		<option value="<?php echo $row['genre_id'];?>">
			<?php echo $row["name"]; ?>		
		</option>

	<?php endwhile;?> 

</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="media-type-id" class="col-sm-3 col-form-label text-sm-right">Media Type:</label>
				<div class="col-sm-9">
<select name="media_type" id="media-type-id" class="form-control">
	<option value="" selected>-- All --</option>

	<!-- <option value='1'>MPEG audio file</option>
	<option value='2'>Protected AAC audio file</option> -->

	<?php while( $row = $results_media_types->fetch_assoc() ) :?>

		<option value="<?php echo $row['media_type_id'];?>">
			<?php echo $row["name"]; ?>		
		</option>

	<?php endwhile;?>

</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Search</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->
		</form>
	</div> <!-- .container -->
</body>
</html>