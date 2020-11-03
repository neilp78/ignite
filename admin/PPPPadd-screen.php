<?php //save
require_once('../includes/config.php');

try {
	$pageTitle = 'New';
	//insert into database
  $stmt = $db->prepare('INSERT INTO blog_posts_seo (postTitle) VALUES (:postTitle)');
  $stmt->execute(array(
		//':postID' => $postID,
    ':postTitle' => $pageTitle
  ));

  $postID = $db->lastInsertId();
	exit;
	header('Location: edit-screen.php?screenid='.$postID.'');

} catch(PDOException $e) {
    echo $e->getMessage();
}

//
?>
