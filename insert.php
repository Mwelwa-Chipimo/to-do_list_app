<?php
//Establish connection with the SQL database
require_once 'connect.php';

$task_item = $_POST['add'];
echo $task_item;

$sql = "INSERT INTO task_table (task_item, users_id)" . 
    "VALUES ('$task_item', '14')";

if ($result = $mysqli -> query($sql)) {
    echo " Task entered successfully";
    } else {
        echo $mysqli->error;
    }

?>