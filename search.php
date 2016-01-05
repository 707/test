<?php

require_once('connection.php');
try {

	if(isset($_POST['search']))
{
	$searchq = $_POST['search'];

	$query = $db -> prepare("SELECT * FROM BLOGCONTENT WHERE TITLE LIKE '%$searchq' OR  TITLE LIKE '$searchq%' OR TITLE LIKE '%$searchq%'");
    $query -> execute();

while($search_results = $query->fetch(PDO::FETCH_ASSOC))
{	

$title = $search_results['TITLE'];
$article_id = $search_results['ARTICLE_ID'];


$output = '<div id = "'.$article_id.'" class = "search">'.$title.'</div>';
echo $output;
}

}

else
{
	echo "sarch";
}
}
	
 catch (Exception $e) {
	
}

