<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
  <script src="../scripts/scripts.js"></script>

</head>
<body>

<div id="wrapper" class="add-post">

	<?php include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Add Post</h2>

	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

    // location where initial upload will be moved to
		$target = "images/" . $_FILES['postImage']['name'];
		$path = '../'.$target;

    //thumbs
    $thumbtarget = "images/thumbs/" . $_FILES['postThumb']['name'];
    $thumbpath = '../'.$thumbtarget;

		//collect form data
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

    //very basic validation
		if($type ==''){
			$error[] = 'Please enter the type.';
		}

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

    if(isset($_FILES['postImage'])){

			// find thevtype of image
			switch ($_FILES["postImage"]["type"]) {
			case $_FILES["postImage"]["type"] == "image/gif":
			    move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
			    break;
			case $_FILES["postImage"]["type"] == "image/jpeg":
			       move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
			    break;
			case $_FILES["postImage"]["type"] == "image/pjpeg":
			       move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
			    break;
			case $_FILES["postImage"]["type"] == "image/png":
			    move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
			    break;
			case $_FILES["postImage"]["type"] == "image/x-png":
			    move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
			    break;

			default:
			    $error[] = 'Wrong image type selected. Only JPG, PNG or GIF accepted!.';
			}

		}
    if(isset($_FILES['postThumb'])){

			// find thevtype of image
			switch ($_FILES["postThumb"]["type"]) {
			case $_FILES["postThumb"]["type"] == "image/gif":
			    move_uploaded_file($_FILES["postThumb"]["tmp_name"], $thumbpath);
			    break;
			case $_FILES["postThumb"]["type"] == "image/jpeg":
			       move_uploaded_file($_FILES["postThumb"]["tmp_name"], $thumbpath);
			    break;
			case $_FILES["postThumb"]["type"] == "image/pjpeg":
			       move_uploaded_file($_FILES["postThumb"]["tmp_name"], $thumbpath);
			    break;
			case $_FILES["postThumb"]["type"] == "image/png":
			    move_uploaded_file($_FILES["postThumb"]["tmp_name"], $thumbpath);
			    break;
			case $_FILES["postThumb"]["type"] == "image/x-png":
			    move_uploaded_file($_FILES["postThumb"]["tmp_name"], $thumbpath);
			    break;

			default:
			    $error[] = 'Wrong image type selected. Only JPG, PNG or GIF accepted!.';
			}

		}
		if(!isset($error)){

			try {

        if(isset($_POST['menuItem'])){
            //$stok is checked and value = 1
            $menuitem = 'yes';
        }
        else{
            //$stok is nog checked and value=0
            $menuitem = 'no';
        }
				$postSlug = slug($postTitle);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_posts_seo (postTitle,highlight,type,postSlug,postDesc,postCont,method,ingredients,postDate,menuItem,imageAlt,imageTitle) VALUES (:postTitle, :highlight, :type, :postSlug, :postDesc, :postCont, :method, :ingredients, :postDate, "'.$menuitem.'", :imageAlt, :imageTitle)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
          ':highlight' => $highlight,
          ':type' => $type,
					':postSlug' => $postSlug,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':method' => $method,
					':ingredients' => $ingredients,
          ':imageTitle' => $imageTitle,
          ':imageAlt' => $imageAlt,
					':postDate' => date('Y-m-d H:i:s')
				));

        $postID = $db->lastInsertId();

        if(isset($_FILES['postImage'])){

          $stmt = $db->prepare('UPDATE blog_posts_seo SET postImage = :image WHERE postID = :postID') ;
            $stmt->execute(array(
                ':postID' => $postID,
                ':image' => $target
            ));
	      }

        if(isset($_FILES['postThumb'])){

          $stmt3 = $db->prepare('UPDATE blog_posts_seo SET postThumb = :postThumb WHERE postID = :postID') ;
            $stmt3->execute(array(
                ':postID' => $postID,
                ':postThumb' => $thumbtarget
            ));
        }

				//add categories
				if(is_array($catID)){
					foreach($_POST['catID'] as $catID){
						$stmt = $db->prepare('INSERT INTO blog_post_cats (postID,catID)VALUES(:postID,:catID)');
						$stmt->execute(array(
							':postID' => $postID,
							':catID' => $catID
						));
					}
				}

				//redirect to index page
				header('Location: index.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post' enctype="multipart/form-data">

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

    <p><label>Image</label><br />
    <input type="radio" class="selecttype" name="type" value="blogpost"> Blog post<br>
    <input type="radio" class="selecttype" name="type" value="recipe"> Recipe<br>
    <input type="radio" class="basicpage" name="type" value="basicpage"> Basic page<br>
    </p>

    <input type="checkbox" name="highlight" value="highlight">Highlight<br>
    <input type="checkbox" name="menuItem" value="menuItem">Add to menu<br>
    <p><label>Image</label><br />
    <input type='file' name='postImage'></p>

    <p><label>Image Alt</label><br />
    <input type='text' name='imageAlt' value='<?php if(isset($error)){ echo $_POST['imageAlt'];}?>'></p>

    <label>Image title</label><br />
    <input type='text' name='imageTitle' value='<?php if(isset($error)){ echo $_POST['imageTitle'];}?>'></p>
    </p>
    <p><label>Thumbnail</label><br />
    <input type='file' name='postThumb'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

    <div id="show_recipe">
      <p><label>Method</label><br />
      <textarea name='method' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['method'];}?></textarea></p>
      <p><label>Ingredients</label><br />
      <textarea name='ingredients' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['ingredients'];}?></textarea></p>
    </div>

		<fieldset>
			<legend>Categories</legend>

			<?php

			$stmt2 = $db->query('SELECT catID, catTitle FROM blog_cats ORDER BY catTitle');
			while($row2 = $stmt2->fetch()){

				if(isset($_POST['catID'])){

					if(in_array($row2['catID'], $_POST['catID'])){
                       $checked="checked='checked'";
                    }else{
                       $checked = null;
                    }
				}

			    echo "<input type='checkbox' name='catID[]' value='".$row2['catID']."' $checked> ".$row2['catTitle']."<br />";
			}

			?>

		</fieldset>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
