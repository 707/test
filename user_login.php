<?php
session_start();

require_once ('password.php');

require_once('connection.php');

        ini_set("display_errors", TRUE);

try
{

if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['username']))
  $username = $_POST['username'];

  if(isset($_POST['password']))
    $password = $_POST['password'];
{

$query = $db -> prepare('SELECT * FROM LOGIN where USERNAME = ?   ');
       $query -> bindParam(1,$username);
     
 $query -> execute();
 $results = $query->fetch(PDO::FETCH_ASSOC); 

   if( count($results) > 0 && password_verify($_POST["password"], $results['PASSWORD']))
     {

        $_SESSION['username_id'] = $results['USERNAME'];

       // $_SESSION['firtname_user'] = $results['FIRSTNAME'];
        header('Location:../home.php');
        die();
      }
    else
                 { 
?>
         <h2 class="exits"> Username or password is incorrect! </h2> 
      
        <?php
}

}

         

 
     
}}

catch(Exception $e)
{

    $e->getMessage();
}

?>