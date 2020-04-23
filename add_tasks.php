<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
    <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
        <div class="form-group">
            <label for="text_area">Enter your task.</label>
            <textarea class="form-control" id="text_area" name="task" rows="3" placeholder="Enter your task..."></textarea>
        </div>
            
        <button type="create" name="create" class="btn btn-primary">Create</button>
    </form>
    </div>
    
    <!----------------------- PHP ----------------------------->

    <?php

    if(isset($_POST['create'])) {
        $task = $_POST['task'];
        echo "Variable 'task' successfully created!<br>";
    } else {
        echo "Postsuperglobal not set.";
    }

    //OOP approach to connecting to the datbase.
    require_once 'base.php';

    //Establish connection vis instantiation.
    $dbc = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection.
    if ($dbc -> connect_errno) {
    echo "Failed to connect to MySQL: " . $dbc -> connect_error;
    exit();
    } else {
        echo "Successfully connected to the server.";
    }

    //Create a query variable.
    $query = "INSERT INTO tasks (task)" . 
    "VALUES ('$task')";

    //Query to the to_do database.
    $insertion = mysqli_query($dbc, $query)
    or die('Not good... there was an error querying your database. Check your code again');

    mysqli_close($dbc);




    ?>
        
        <script src="" async defer></script>
    </body>
</html>