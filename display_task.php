<?php

 //Establish connection with the SQL database
 require_once 'connect.php';

 //Include task class.
 include_once 'task_class.php';




//Build a resource
$sql = "SELECT * FROM task_table ORDER BY task_timestamp DESC";
$result = mysqli_query($mysqli, $sql);


$row = mysqli_fetch_assoc($result);
//var_dump($row);

if(mysqli_num_rows($result) > 0) {
    
    $task_1 = new taskItem($row["id"], $row["task_item"]);
    $task_1->displayTask();

    
    //Loops through an associative array.
    while ($row = mysqli_fetch_assoc($result)) {

        $task_1 = new taskItem($row["id"], $row["task_item"]);
        $task_1->displayTask();
        //var_dump($question);
    }
} else {
    echo "There was a problem echoing out your question.";
} 


$mysqli -> close();

?>