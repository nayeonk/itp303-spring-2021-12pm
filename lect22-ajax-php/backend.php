<?php
	$php_array = [
		"first_name" => "Tommy",
		"last_name" => "Trojan",
		"age" => 21,
		"phone" => [
			"cell" => "123-123-1234",

			"home" => "456-456-4567"
		],
	];

	// whatever this file echoes out, the frontend.html will get back. remember that echo returns STRINGS only
	//echo "hi";

	//$_GET["searchTerm"];

	// We can convert php assoc array into a JSON formatted string
	// echo json_encode($php_array);


	// Connect to the database to search for a song in the database
	$host = "303.itpwebdev.com";
	$user = "nayeon_db_user";
	$pass = "uscItp2021!";
	$db = "nayeon_song_db";

	$mysqli = new mysqli($host, $user, $pass, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	// Generate the SQL based on the user's input
	$sql = "SELECT * FROM tracks WHERE name LIKE '%" . $_GET["term"] . "%' LIMIT 10;";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	$results_array = [];

	// Run the while loop to get all the results. Store the results in another variable
	while( $row = $results->fetch_assoc()) {
		array_push($results_array, $row);
	}

	// Convert the assoc array to a json string
	echo json_encode($results_array);


?>