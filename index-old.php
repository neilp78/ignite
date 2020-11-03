<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta property="og:title" content="Cegin Fach - The Little Kitchen">
    <meta property="og:description" content="From garden to kichen. Growing and cooking good wholesome food. Gower, UK">
    <meta property="og:image" content="">
    <meta property="og:url" content="http://localhost:8888/mpoz3/>">
    <meta name="twitter:card" content="summary_large_image">


    <meta property="og:site_name" content="<?php print $row['postID']; ?>">
    <meta name="twitter:image:alt" content="<?php print $row['postID']; ?>">
    <title>Cegin Fach</title>
		<?php include('style/header.php'); ?>
<body>

  <div id="container">

  <header id="header">
		<div id="branding"><a href="./">Cegin Fach</a></div>
		<nav id="nav">
			<?php include('menu.php'); ?>
		</nav>
	</header>
	<div id="wrapper">
    <div id='main'>
      <div id="main-left">
			<?php
				try {

					$pages = new Paginator('12','p');

					$stmt = $db->query('SELECT postID FROM blog_posts_seo');

					//pass number of records to
					$pages->set_total($stmt->rowCount());

					$stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate, postThumb FROM blog_posts_seo ORDER BY postID DESC '.$pages->get_limit());
					while($row = $stmt->fetch()){


            print '<div class="tile"><div class="tile-left">';
              if(!empty($row['postThumb'])) {
                $allowedlimit = 14;
              	 if(mb_strlen($row['postThumb'])>$allowedlimit) {
              			echo '<div class="thumb"><img src="'.$row['postThumb'].'" /></div>';
              		}
              }
              echo '</div>';
              echo '<div class="tile-right"><h2 class="home-h2"><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h2>';

							echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

								$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
								$stmt2->execute(array(':postID' => $row['postID']));

								$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

								$links = array();
								foreach ($catRow as $cat)
								{
								    $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
								}
								echo implode(", ", $links);

							echo '</p>';
							echo '<p>'.$row['postDesc'].'</p>';
							echo '<p><a href="'.$row['postSlug'].'">Read More</a></p></div></div>';
					}

					echo $pages->page_links();

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
			?>

		</div>


		<div id='sidebar'>
			<?php require('sidebar.php'); ?>
		</div>

  </div><!-- #main -->
		<div id='clear'></div>

	</div>


<?php include('style/footer.php'); ?>
