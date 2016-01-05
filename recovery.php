
<?php
require_once 'connection.php';
try{
$email = $_POST["email"];
$password = md5($email);  



$user_query = $db->prepare("SELECT USERNAME FROM LOGIN WHERE EMAIL = ?");
$user_query->bindParam(1,$email);
$user_query->execute();
$row = $user_query->fetch();
$user_name = $row['USERNAME'];


//$query_password = $db->prepare("UPDATE LOGIN set PASSWORD = '".$_POST["password"]."' WHERE  USERNAME=?)//".$_SESSION["username_id"];
$query_password = $db->prepare("UPDATE LOGIN set PASSWORD = ? WHERE  USERNAME = ?");
$query_password->bindParam(1,$password);
$query_password->bindParam(2,$user_name);
$query_password->execute();

$send_data = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ? AND PASSWORD = ?");
 $send_data->bindParam(1,$user_name);
 $send_data->bindParam(2,$password);
 $send_data->execute();
$rows = $send_data->fetch();
$send_pwd = $rows['PASSWORD'];
$send_uname = $rows['USERNAME'];

$url = "www.onthego.co.in";
$from = "contact.ontheblog@gmail.com";

$subject = "no-reply , password recovery for onthego.co.in";
$body = "Password Recovery Request
--------------------------------------------------------------
Th credentials for yur logiin are as below : 

Username : $send_uname;
Password : $send_pwd;

Please update your password from your profile once you login .

Sincerely,
On The Go Team.";
$headers1 = "From: $from\n";

	        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
	        $headers1 .= "X-Priority: 1\r\n";

	        $headers1 .= "X-MSMail-Priority: High\r\n";

	        $headers1 .= "X-Mailer: Just My Server\r\n";

	        $sentmail = mail ( $to, $subject, $body, $headers1 );


 }
 catch(Exception $e){
 	$e->getMessage();
 }
 ?>