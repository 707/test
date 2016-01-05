<?php
session_start();
require_once ('connection.php');
require_once('password.php');
try
{

$username=($_POST["user-name"]);
$user_id = md5($username);
$password = password_hash($_POST["passwd"], PASSWORD_DEFAULT);  //be  careful with single and double quotes.!!!!
$email=($_POST["email"]);
$firstname =($_POST["first-name"]);                                //or else password verify might not work.
$lastname=($_POST["last-name"]);




$query = $db -> prepare("INSERT INTO LOGIN (USERNAME,USER_ID,EMAIL,PASSWORD,FIRSTNAME,LASTNAME) VALUES(?,?,?,?,?,?)");
        $query -> bindParam(1,$username);
        $query->bindParam(2,$user_id);
        $query->bindParam(3,$email);
        $query->bindParam(4,$password);
        $query->bindParam(5,$firstname);
        $query->bindParam(6,$lastname);
        $query->execute();
		
        $_SESSION['username_id'] = $username;
$data = '<span>Thanks for Registering !</span>';
echo $data;
         }

     catch(Exception $e)
     {
 
     }
     ?>