
	<?php
session_start();
 require_once('connection.php');
$user_info = $_SESSION['username_id'];
$update = $_POST["update"];

try{

if($update == "email")
{
$email = $_POST["email"];

$user_query = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$user_query->bindParam(1,$user_info);
$user_query->execute();
$row = $user_query->fetch();
$user_name = $row['USERNAME'];


//$query_email = $db->prepare("UPDATE LOGIN set FIRSTNAME = '".$_POST["email"]."' WHERE  USERNAME=?)//".$_SESSION["username_id"];
$query_email = $db->prepare("UPDATE LOGIN set EMAIL = ? WHERE  USERNAME = ?");
$query_email->bindParam(1,$email);
$query_email->bindParam(2,$user_name);
$query_email->execute();

$query_get = $db->prepare("SELECT EMAIL FROM LOGIN WHERE USERNAME = '$user_info'");
$query_get->execute();
$row = $query_get->fetch();
$email = $row['EMAIL'];
echo $email;

 }

 else if($update == "dob")
 {
 $date = $_POST["dob"];
$dob = date("Y-m-d",strtotime($date));

$user_query = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$user_query->bindParam(1,$user_info);
$user_query->execute();
$row = $user_query->fetch();
$user_name = $row['USERNAME'];
$dob = $_POST["dob"];

//$query_dob = $db->prepare("UPDATE LOGIN set FIRSTNAME = '".$_POST["dob"]."' WHERE  USERNAME=?)//".$_SESSION["username_id"];
$query_dob = $db->prepare("UPDATE LOGIN set DOB = ? WHERE  USERNAME = ?");
$query_dob->bindParam(1,$dob);
$query_dob->bindParam(2,$user_name);
$query_dob->execute();

$query_get = $db->prepare("SELECT DOB FROM LOGIN WHERE USERNAME = '$user_info'");
$query_get->execute();
$row = $query_get->fetch();
$dob = $row['DOB'];
echo date('F jS Y', strtotime($dob));

 }

else if($update == "fname")
{
$fname = $_POST["fname"];

echo $fname;
//$query_fname = $db->prepare("UPDATE LOGIN set FIRSTNAME = '".$_POST["fname"]."' WHERE  USERNAME=?)//".$_SESSION["username_id"];
$query_fname = $db->prepare("UPDATE LOGIN set FIRSTNAME = ? WHERE  USERNAME = ?");
$query_fname->bindParam(1,$fname);
$query_fname->bindParam(2,$user_info);
$query_fname->execute();

$query_get = $db->prepare("SELECT FIRSTNAME FROM LOGIN WHERE USERNAME = '$user_info'");
$query_get->execute();
$row = $query_get->fetch();
$firstname = $row['FIRSTNAME'];
echo $firstname;

 }
 else if ($update == "lname")
{
$lname = $_POST["lname"];




//$query_lname = $db->prepare("UPDATE LOGIN set LASTNAME = '".$_POST["lname"]."' WHERE  USERNAME=?)//".$_SESSION["username_id"];
$query_lname = $db->prepare("UPDATE LOGIN set LASTNAME = ? WHERE  USERNAME = ?");
$query_lname->bindParam(1,$lname);
$query_lname->bindParam(2,$user_info);
$query_lname->execute();

$query_get = $db->prepare("SELECT LASTNAME FROM LOGIN WHERE USERNAME = '$user_info'");
$query_get->execute();
$row = $query_get->fetch();
$lastname = $row['LASTNAME'];
echo $lastname;

 }

else if ($update == "password")
{
$passwd = $_POST["password"];
$password = password_hash($passwd, PASSWORD_DEFAULT);  



//$query_password = $db->prepare("UPDATE LOGIN set PASSWORD = '".$_POST["password"]."' WHERE  USERNAME=?)//".$_SESSION["username_id"];
$query_password = $db->prepare("UPDATE LOGIN set PASSWORD = ? WHERE  USERNAME = ?");
$query_password->bindParam(1,$password);
$query_password->bindParam(2,$user_info);
$query_password->execute();

echo "Updated.";

 }
}
catch(Exception $e)
{
	$e->getMessage();

 }