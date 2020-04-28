<?php
session_start();
var_dump($_SESSION);



function sanitizeString($var)
{
    include 'connect.php';
	$var = strip_tags($var);
	$var = htmlspecialchars($var);
	$var = stripslashes($var);
	$mysqli->real_escape_string($var);
	return $var;
}

if (isset($_POST['add']))
{
	//attempt to remove html injection and other hacking attempts
	$clean_task_item = sanitizeString($_POST['add']);
    $users_id = $_SESSION["id"];
	//Query to Add new entry into table
	$sql = "INSERT INTO task_table (task_item, users_id)" .
	"VALUES ('$clean_task_item','$users_id')";
	//Execute query and validate success
	if ($mysqli->query($sql)) {
        //echo "New record created successfully";
		unset($sql);
	} else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
	}	
}
?>