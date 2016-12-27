<?php

	$host ='localhost';
	$Port = 3306;
	$bd = 'lairton';
	$user = 'root';
	$pass = '';

	$conexao = mysqli_connect($host,$user,$pass) or die(mysql_error());
	mysqli_select_db($conexao,$bd);

/*
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";*/
?>