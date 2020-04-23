<?php

    //Links Question class to the script
    include_once 'base.php';

    //Include task class.
    include_once 'task_class.php';

    //Establish connection vis instantiation.
    $dbc = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection.
    if ($dbc -> connect_error) {
    echo "Failed to connect to MySQL: " . $dbc -> connect_error;
    exit();
    } else {
        echo "Successfully connected to the server.";
    }

?>

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
    
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <?php

        //Build a resource
        $sql = "SELECT * FROM tasks";
        $result = mysqli_query($dbc, $sql);


        $row = mysqli_fetch_assoc($result);
        var_dump($row);

        if(mysqli_num_rows($result) > 0) {
            
            $task_1 = new taskItem($row["task"]);
            $task_1->displayTask();

            //$x = 1;
            // var_dump('Im Here');
            //Loops through an associative array.
            while ($row = mysqli_fetch_assoc($result)) {
                //$x++;

                $task_1 = new taskItem($row["task"]);
                $task_1->displayTask();
                //var_dump($question);

            
            }
        } else {
            echo "There was a problem echoing out your question.";
        } 
        

        mysqli_close($dbc);

        ?>


    </form>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

    <!--
    <div class="container">
    <form method="post" action="<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <?php /*

        //Build a resource
        $sql = "SELECT * FROM tasks";
        $result = mysqli_query($dbc, $sql);


        $row = mysqli_fetch_assoc($result);
        var_dump($row);

        if(mysqli_num_rows($result) > 0) {
            
            $task_1 = new taskItem($row["task"]);
            $task_1->displayTask();

            //$x = 1;
            // var_dump('Im Here');
            //Loops through an associative array.
            while ($row = mysqli_fetch_assoc($result)) {
                //$x++;

                $task_1 = new taskItem($row["task"]);
                $task_1->displayTask();
                //var_dump($question);

            
            }
        } else {
            echo "There was a problem echoing out your question.";
        } 
        

        mysqli_close($dbc);
        */
        ?>


    </form>
    </div>
    -->

        
        
        <script src="" async defer></script>
    </body>
</html>