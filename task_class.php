<?php

/*
include_once 'add_questions.php';
$try = "try";
*/

class taskItem{


    // P R O P E R T I E S

    public $task;


    //Set values of the properties above

    function __construct ($task) {
        $this->task = $task;
    
    }

    // M E T H O D

    //This method will print out the question in HTML

    function displayTask(){

        //Questions

        //Option A
        
        echo     "<div class='option-button'>";                   
        echo        "<input id='task_item' type='checkbox' name='task_item' value='A'>";
        echo        "<label style='color:#4d4d4d;' for='task_item'>" . $this->task . "</label>";
        echo    "</div>"; 

    }

}


$task_1 = new taskItem("this is a test too");
$task_1->displayTask();


/*
$question_1 = new Question($q_number, $q_text, $optionA, $optionB, $optionC, $optionD, $ans, $explanation);
$question_1->buildQuestion();
echo $question_1->getCorrectAns();
*/


?>