<?php
class includes extends Controller{
	public function index(){
        require ("Views/includes/index.php");
        return;
    }
}
// include 'blogpost.php';
// function GetBlogPosts($inId = null, $inTagId = null)
// {
// 	if (!empty($inId)) {
// 		$stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = " . $inId . " ORDER BY id DESC");
// 		$stmt->execute();
// 	} else if (!empty($inTagId)) {
// 		$stmt = $conn->prepare("SELECT blog_posts.* FROM blog_post_tags LEFT JOIN (blog_posts) ON (blog_post_tags.blog_post_id = blog_posts.id) WHERE blog_post_tags.tag_id =" . $inTagId . " ORDER BY blog_posts.id DESC");
// 		$stmt->execute();
// 	} else {
// 		$stmt = $conn->prepare("SELECT * FROM blog_posts ORDER BY id DESC");
// 		$stmt->execute();
// 	}

// 	$postArray = array();
// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
// 		$myPost = new BlogPost($row['id'], $row['title'], $row['post'], $row['post'], $row["author_id"], $row["date_posted"]);
// 		$postArray[] = $myPost;
// 	}
// 	return $postArray;
// }

?>