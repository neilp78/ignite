
<ul>
<h2>From the blog</h2>
<?php
$stmt = $db->query('SELECT postTitle, postSlug, postDesc, postThumb FROM blog_posts_seo WHERE type = "blogpost" ORDER BY postID DESC LIMIT 3');
while($row = $stmt->fetch()){
	echo '<li class="tile"><img src="'.$row["postThumb"].'" /><span class="card-body"><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></span></li>';
}
?>
</ul>

<ul>
<h2>Form the kitchen</h2>
<?php
$stmt = $db->query('SELECT postTitle, postSlug, postDesc, postThumb FROM blog_posts_seo WHERE type = "recipe" ORDER BY postID DESC LIMIT 3');
while($row = $stmt->fetch()){
	echo '<li class="tile"><img src="'.$row["postThumb"].'" /><span class="card-body"><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></span></li>';
}
?>
</ul>





<ul>
<h2>Catgories</h2>
<?php
$stmt = $db->query('SELECT catTitle, catSlug FROM blog_cats ORDER BY catID DESC');
while($row = $stmt->fetch()){
	echo '<li><a href="c-'.$row['catSlug'].'">'.$row['catTitle'].'</a></li>';
}
?>
</ul>




<ul>
<h2>Archives</h2>
<?php
$stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM blog_posts_seo GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
while($row = $stmt->fetch()){
	$monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
	$slug = 'a-'.$row['Month'].'-'.$row['Year'];
	echo "<li><a href='$slug'>$monthName</a></li>";
}
?>
</ul>
