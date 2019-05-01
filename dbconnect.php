<?php
		// $server = "localhost";
		// $user = "id8664062_wp_326d4377135899a6fd7f17bdca445d22";
		// $pass = "57a3e4b274b446e01973e0429fdf4bcaa5e9d681";
		// $db = "id8664062_wp_326d4377135899a6fd7f17bdca445d22";

		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "dbuploader";

		$conn = new mysqli($server,$user,$pass,$db);
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
?>