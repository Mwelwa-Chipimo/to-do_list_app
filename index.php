<?php

    // Start the session
    session_start();
    //var_dump($_SESSION); 

    $firstname = $_SESSION['firstname'];

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: register.php");
        exit;
    }

    //Establish connection with the SQL database
    require_once 'connect.php';

    //Include task class.
    include_once 'task_class.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- JQuery CDN -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('#insert').click(function(event) {
                event.preventDefault();
                    $.ajax({
                    url: "insert.php",
                    method: "post",
                    data: $('form').serialize(),
                    datatype: "text",
                    success: function(strMessage) {
                        $('#message').text(strMessage)
                    }
                })
            })

            $('#load').click(function(event) {
                event.preventDefault();
                    $.ajax({
                    url: "display_task.php",
                    datatype: "html",
                    success: function(result) {
                        $('#result').html(result)
                    }
                })
            })
        });

    
    </script>
    
</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
        <a class="navbar-brand" href="#">CheckIt</a>
       
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout
                <span class="sr-only">(current)</span>
                </a>
            </li>
            </ul>
        </div>
    </nav>


    <!-- Page Content -->

    <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Hey, <?php echo $firstname ?></h1>
        <p class="lead">Add all your tasks here.</p>
        
        <!---------------------- ADD TASKS SECTION ---------------------->

        <!--------------------- Form element to add task item to the database ------------------->

        <p id="message"></p>
        <form class="form-inline" role="form" action="test_index.php" method="post">
        <div class="mx-auto">
            <input type="text" class="form-control" name="add" id="addID">
            <button type="submit" name="insert" id="insert" class="btn btn-success" value="submit">Add</button>
        </div>
        </form>  
 

        <!---------------------- SHOW TASKS ------------------------>

        <h2>Tasks</h2>
        <p class="lead">View all your tasks below.</p>

    
        <form class="form-inline" role="form" action="test_index.php" method="post">
        <div class="mx-auto"> 
            <button type="submit" name="load" id="load" class="btn btn-primary" value="submit">Show tasks</button>
        </div>
        </form> 
        

        <div id="result"></div>
        
      </div>
    </div>
  </div>

  
    </div>
</body>
</html>