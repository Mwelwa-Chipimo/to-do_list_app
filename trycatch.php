<?php
/*************************************************************************

Exceptions can be handled using an object oriented approach in PHP 5+

We use exceptions to capture errors in code (avoiding PHP's default behaviour), 
   * return the state of execution, and change the applications flow of control
   * we can also use exceptions to terminate a script
    
PHP's Exception class has properties and methods for handling exceptions
We often use a try{} catch{} construct to capture potential errors 
    A function using an exception should be in a "try" block. 
    If the exception does not trigger, the code will continue as normal. 
    However if erroneous code is encountered, an exception is "thrown" and a catch{}
    block should be present to intercept the exception
    
    A "catch" block retrieves an exception and creates an object 
    containing the exception information
    
    We use throw to trigger an exception. Each "throw" must have at least one "catch"
    If you throw something you have to catch it!

*************************************************************************/

class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

//intentional erroneous email address
$email = "someone@example...com";

try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid 
    throw new customException($email);
    //a new customException is instantiated and passed to trow  
  }
}

catch (customException $e) {
  //catch intercepts the throw with the new instance and assigns it to $e    
  //display custom message
  echo $e->errorMessage();
}



//Multiple exceptions 
/*
System errors should be obscured from the user
The Exception class provides us with a means of handling errors without 
    having to terminate script execution, invariably
    retaining related exceptions within a single object
    and overriding PHP's default behaviour 
*/
//-----snip--------//
try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid
    throw new customException($email);
  }
  //check for "example" in mail address
  if(strpos($email, "example") !== FALSE) {
    throw new Exception("$email is an example e-mail");
  }
}

catch (customException $e) {
  echo $e->errorMessage();
}

catch(Exception $e) {
  echo $e->getMessage();
}
//-----snip--------//


//Top level exception handling//
/*
We use the set_exception_handler() function as a top level 
exception handler to catch all exceptions that may occur and
have not been accomodated for.
Set the function to capture all exceptions from a function
by providing the name of the function as a string, within the 
function's argument list.
*/
//--snip--//
set_exception_handler('myException');

?> 


<?php
//PDO has its own Exception class PDOException

$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>