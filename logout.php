<?php
session_start();
$_SESSION = array(); //resetting the session array to null.
session_destroy();
header('Location: index.php');
exit;
?>