<?php //save
require_once('../includes/config.php');

	try {
		//insert into database
		$postCont = '<div class="govuk-grid-row"><div id="area-1" class="sortablelist connectedSortable activearea ui-sortable govuk-grid-column-full"></div></div><div class="govuk-grid-row"><div id="area-2" class="sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds"></div><div id="area-3" class="sortablelist connectedSortable ui-sortable govuk-grid-column-one-third"></div></div>';
		$postTitle = 'New Screen';

		$stmt = $db->prepare('INSERT INTO blog_posts_seo (postID,postTitle,postCont,postDate) VALUES (:postID, :postTitle, :postCont, :postDate)') ;
    $stmt->execute(array(
      ':postID' => $postID,
      ':postTitle' => $postTitle,
			':postCont' => $postCont,
			':postDate' => date('Y-m-d H:i:s')
    ));

    $postID = $db->lastInsertId();

		if (!file_exists('prototypes/pid10')) {
    	mkdir('prototypes/pid10', 0777, true);
			$newjson = fopen('prototypes/pid10/screenid'.$postID.'.json', "w") or die("Unable to open file!");
			$json = '{
						  "screens": {
						    [
						      "id":'.$postID.',
									"title":"New screen",
						      "html":"",
						    ]
						  }
						}
			';
			fwrite($newjson, $json);
			fclose($newjson);
		}

    print '<div id="postid">'.$postID.'</div>';
		header('Location: edit-screen.php?screenid='.$postID.'');
		exit;

	} catch(PDOException $e) {
	    echo $e->getMessage();
	}

?>
