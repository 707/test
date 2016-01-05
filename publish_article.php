<?php 
session_start();
require_once 'connection.php';

try {
$title = ($_POST["title"]);
$username_id= $_SESSION['username_id'];

$time = date("Y-m-d H:i:s"); 

$category =($_POST["category"]);
$description=($_POST["description"]);
$article = html_entity_decode($_POST["article"]);  



 echo $title;
 echo $article;
 echo $description;
 echo $category;

$article_id = uniqid();
$query = $db -> prepare("INSERT INTO `BLOGCONTENT`(`TITLE`, `CATEGORY`, `DESCRIPTION`, `ARTICLE`, `USERTIME`, `AUTHOR`, `ARTICLE_ID`) VALUES (?,?,?,?,?,?,?)");
echo "string";
        $query -> bindParam(1,$title);
        $query -> bindParam(2,$category);
        $query -> bindParam(3,$description);
        $query -> bindParam(4,$article);
        $query -> bindParam(5,$time);
        $query -> bindParam(6,$username_id);
        $query -> bindParam(7,$article_id);
        $query->execute();
echo "s";
 if($query->rowCount()>0){
 
     echo "hi";

$query_postcount=$db->prepare("UPDATE LOGIN SET POSTS_COUNT = POSTS_COUNT+1 WHERE USERNAME = ?");
$query_postcount->bindParam(1,$username_id);
$query_postcount->execute();
 echo "what";
  
}

} 

catch (Exception $e) {
  $e->getMessage();


}
?>