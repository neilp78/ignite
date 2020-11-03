<?php require('includes/config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">

		<?php

					echo '<title>'.$row['postTitle'].'</title>';

		?>
		<?php include('style/header.php'); ?>

		<body>

		<header id="header">
			<h1>Blog</h1>
			<nav id="nav">
				<ul class="menu">
					<li class="menuitem"><a href="./">Home</a>
					<?php
						$menuitem = 'yes';
						try {

							$mainmenu = $db->query('SELECT postID, postTitle, postSlug FROM blog_posts_seo WHERE menuItem = "yes"');

							while($rowmain = $mainmenu->fetch()){

								echo '<li class="menuitem"><a href="'.$rowmain['postSlug'].'">'.$rowmain['postTitle'].'</a></li>';

							}

						} catch(PDOException $e) {
						    echo $e->getMessage();
						}

					?>
				</ul>
			</nav>
		</header>
<body>
<?php

//$search = $db->prepare("SELECT * FROM blog_posts_seo WHERE postTitle LIKE ".$q."");
// Execute with wildcards
//$search->execute(array("%$q%"));
//print $_POST['q'];
if(isset($_GET['q'])){
    $input_search = $_POST['q'];
    print $_POST['q'];
    $results = $link->prepare('SELECT * FROM blog_posts_seo WHERE postTitle LIKE ?');
    $results->execute(array('%'.$input_search.'%'));
    $all_results = $results->fetchAll();
    $row_cnt = $results->rowCount();

    if($row_cnt == 0){
        $content .= "There are no results.";
    } else {
        foreach ($all_results as $row1){
            foreach ($row1 as $data){
                $content .= $data ."<br />";
            }
        }
    }
}




include('style/footer.php');
?>
