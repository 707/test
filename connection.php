
      <?php
try{

        ini_set("display_errors", TRUE);

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST')); //ENSURES THE DB CONNECTION//
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$db = new PDO($dsn, DB_USER, DB_PASS);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){

	$e->getMessage();
}
?> 
