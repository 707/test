<?php
//php  for displaying individual content.
header('Content-Type:application/json');
require_once('connection.php');
  //$post_article
$start = isset($_GET['start'])? (int)$_GET['start'] - 1 : 0;
$count = isset($_GET['count'])? (int)$_GET['count'] : 1;


try
{
$query_all = $db->prepare("SELECT  SQL_CALC_FOUND_ROWS * FROM BLOGCONTENT  ORDER BY LIKE_COUNT DESC LIMIT {$start},{$count}");
$query_all->execute();
$articles_Total = $db->prepare("SELECT FOUND_ROWS() AS count  ");
$articles_Total->execute();
$articles_count = $articles_Total->fetch(PDO::FETCH_ASSOC)['count'];

while($results_all= $query_all->fetch())
{
$all_title = $results_all['TITLE'];
$all_category = $results_all['CATEGORY'];
$all_description = $results_all['DESCRIPTION'];
$all_article = $results_all['ARTICLE'];
$all_author = $results_all['AUTHOR'];
$all_articleid = $results_all['ARTICLE_ID'];
$all_articleno = $results_all['ARTICLE_NO'];


$query_user = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$query_user->bindParam(1,$all_author);
$query_user->execute();
$rows=$query_user->fetch();
$profile_id = $rows['USER_ID'];
$profile_name = $rows['USERNAME'];
//$response[] = array_merge($all_title,$all_category,$all_description,$all_article,$all_author,$all_articleid);

//echo json_encode($response)

$items[] = (array(

'post-title' => $all_title ,
'post-author' => $all_author,
'post-description' => $all_description,
'post-category' => $all_category,
'profile-name' => $profile_name,
'category-heading ' => $category_heading,
'article_id' => $all_articleid,
'article_no'=> $all_articleno
	));



}
echo json_encode(array(

	'items' => $items,
	'articles_count' => $articles_count,
	'start' => $start,
	'last' => ($start + $count)>=($articles_count)? true : false,


	));

}


catch(Exception $e)
{
	$e->getMessage();
}

?>