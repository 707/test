<?php
//php  for displaying individual content.
header('Content-Type:application/json');
require_once('connection.php');
  //$post_article
$start = isset($_GET['start'])? (int)$_GET['start'] - 1 : 0;
$count = isset($_GET['count'])? (int)$_GET['count'] : 1;

$category = isset($_GET['category'])? $_GET['category'] : "all";

try
{
if($category == "all")
{

$query_all = $db->prepare("SELECT  SQL_CALC_FOUND_ROWS * FROM BLOGCONTENT  ORDER BY ARTICLE_NO DESC LIMIT {$start},{$count}");
$query_all->execute();
$articles_Total = $db->prepare("SELECT FOUND_ROWS() AS count  ");
$articles_Total->execute();
$articles_count = $articles_Total->fetch(PDO::FETCH_ASSOC)['count'];
$category_heading = "Most Recent Uploads";
$like_number = 0;
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
else if($category == "Popular")

{
$query_popular = $db->prepare("SELECT  SQL_CALC_FOUND_ROWS * FROM BLOGCONTENT  ORDER BY LIKE_COUNT DESC LIMIT {$start},{$count}");
$query_popular->execute();
$articles_Total = $db->prepare("SELECT FOUND_ROWS() AS count  ");
$articles_Total->execute();
$articles_count = $articles_Total->fetch(PDO::FETCH_ASSOC)['count'];


while($results_popular= $query_popular->fetch())
{
$popular_title = $results_popular['TITLE'];
$popular_category = $results_popular['CATEGORY'];
$popular_description = $results_popular['DESCRIPTION'];
$popular_article = $results_popular['ARTICLE'];
$popular_author = $results_popular['AUTHOR'];
$popular_articleid = $results_popular['ARTICLE_ID'];
$popular_articleno = $results_popular['ARTICLE_NO'];


$query_user = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$query_user->bindParam(1,$popular_author);
$query_user->execute();
$rows=$query_user->fetch();
$profile_id = $rows['USER_ID'];
$profile_name = $rows['USERNAME'];
//$response[] = array_merge($popular_title,$popular_category,$popular_description,$popular_article,$popular_author,$popular_articleid);

//echo json_encode($response)

$items[] = (array(

'post-title' => $popular_title ,
'post-author' => $popular_author,
'post-description' => $popular_description,
'post-category' => $popular_category,
'profile-name' => $profile_name,
'article_id' => $popular_articleid,
'article_no'=> $popular_articleno
	));



}
echo json_encode(array(

	'items' => $items,
	'articles_count' => $articles_count,
	'start' => $start,
	'last' => ($start + $count)>=($articles_count)? true : false,


	));

}
else
{
$query_post = $db->prepare("SELECT  SQL_CALC_FOUND_ROWS * FROM BLOGCONTENT WHERE CATEGORY = '$category' ORDER BY ARTICLE_NO DESC LIMIT {$start},{$count}");
$query_post->execute();
$articles_Totaler = $db->prepare("SELECT FOUND_ROWS() AS count  ");
$articles_Totaler->execute();
$articles_counter = $articles_Totaler->fetch(PDO::FETCH_ASSOC)['count'];
while($results_post= $query_post->fetch())
{
$post_title = $results_post['TITLE'];
$post_category = $results_post['CATEGORY'];
$post_description = $results_post['DESCRIPTION'];
$post_article = $results_post['ARTICLE'];
$post_author = $results_post['AUTHOR'];
$post_articleid = $results_post['ARTICLE_ID'];
$post_articleno = $results_post['ARTICLE_NO'];
$query_user = $db->prepare("SELECT * FROM LOGIN WHERE USERNAME = ?");
$query_user->bindParam(1,$post_author);
$query_user->execute();
$rows=$query_user->fetch();
$post_profile_id = $rows['USER_ID'];
$post_profile_name = $rows['USERNAME'];
//$response[] = array_merge($post_title,$post_category,$post_description,$post_article,$post_author,$post_articleid);

//echo json_encode($response)


$specific[] = (array(

'post-title' => $post_title ,
'post-author' => $post_author,
'post-description' => $post_description,
'post-category' => $post_category,
'profile-name' => $post_profile_name,
'article_id' => $post_articleid,
	));



}
echo json_encode(array(

	'items' => $specific,
	'articles_count' => $articles_counter,
	'start' => $start,
	'last' => ($start + $count)>=($articles_counter)? true : false,


	));

}

}
catch(Exception $e)
{
	$e->getMessage();
}

?>
