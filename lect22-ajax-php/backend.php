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

	// We can convert php assoc array into a JSON formatted string
	echo json_encode($php_array);

	// $host = "303.itpwebdev.com";
	// $user = "";
	// $pass = "";
	// $db = "";

	// $mysqli = new mysqli($host, $user, $pass, $db);
	// if ( $mysqli->errno ) {
	// 	echo $mysqli->error;
	// 	exit();
	// }

	// $sql = "";

	// $results = $mysqli->query($sql);
	// if ( !$results ) {
	// 	echo $mysqli->error;
	// 	exit();
	// }

	// $mysqli->close();


?>