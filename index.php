<?php
require 'config.php';

$sql = $database->prepare("select * from blog");
$sql->setFetchMode(PDO::FETCH_OBJ);
$sql->execute();


echo "<h1>posts:</h1>";

while($post = $sql->fetch()) {
	echo 	"<h2><a href='post.php?id=" . $post->id . "'>"
			. $post->header . "</a></h2>";
	//echo "<p>" . $post->content . "</p>";
}