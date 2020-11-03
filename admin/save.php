<?php //save
require_once('../includes/config.php');

if(isset($_POST['newPostTitle'])) {
	try {
		//insert into database
		$postSlug = slug($_POST['newPostSlug']);

    $stmt = $db->prepare('UPDATE blog_posts_seo SET postTitle = :postTitle, postSlug = :postSlug WHERE postID = :postID ') ;
		$stmt->execute(array(
			':postTitle' => $_POST['newPostTitle'],
			':postSlug' => $postSlug,
			':postID' => $_POST['postID']
		));
		exit;
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
}
if(isset($_POST['postID'])) {
	try {
		//insert into database
		$postSlug = slug($_POST['postSlug']);

    $stmt = $db->prepare('UPDATE blog_posts_seo SET postTitle = :postTitle, postSlug = :postSlug, postCont = :postCont WHERE postID = :postID ') ;
		$stmt->execute(array(
			':postTitle' => $_POST['postTitle'],
			':postSlug' => $postSlug,
			':postCont' => $_POST['postCont'],
			':postID' => $_POST['postID']
		));
		print '<div id="saved-noticed">Saved</div>';
		print '<div id="view"><a href="../'.$postSlug.'" target="_blank">View</a></div>';


		//$file="prototypes/pid10/screenid281.json";

		if(file_exists('prototypes/pid10/screenid281.json'))  {
				 $current_data = file_get_contents('prototypes/pid10/screenid281.json');
				 $array_data = json_decode($current_data, true);

				 $extra = array(
							'id'    =>  $_POST['postID'],
							'title' =>  $_POST["postTitle"]//,
							//'html'  =>  $_POST["postCont"]
				 );
				 foreach ($array_data as $key => $entry) {
					    if ($entry['id'] == $_POST['postID']) {
					        $array_data[$key]['html'] = $_POST["postCont"];
					    }
					}
				 $array_data[] = $extra;
				 $final_data = json_encode($array_data);
				 if(file_put_contents('prototypes/pid10/screenid281.json', $final_data))  {
							$message = "<label class='text-success'>File Appended Success fully</p>";
				 }
		}

		exit;
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
}
?>
<div id="tab-page-view-content-refresh" class="ui bottom attached inactive tab segment">
	<ul>
	<?php
		try {
			$stmt2 = $db->query('SELECT postID, postTitle, postSlug FROM blog_posts_seo');
			while($row2 = $stmt2->fetch()){
				//echo '<div class="ui-pages"><a href="edit-screen.php?postid='.$row['postID'].'"><i class="file icon"></i> '.$row['postTitle'].'</a></div>';
				print '<li class="item-'.$row2['postID'].'"><a class="item" href="edit-screen.php?screenid='.$row2['postID'].'"><i class="file outline icon"></i> '.$row2['postTitle'].'</a></li>';
				}
			} catch(PDOException $e) {
					echo $e->getMessage();
			}
		?>
	</ul>
</div>
