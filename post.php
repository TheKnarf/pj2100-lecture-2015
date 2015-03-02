<?php
require 'config.php';

// Get the post
$sql = $database->prepare("select * from blog where id=:id");
$sql->setFetchMode(PDO::FETCH_OBJ);

$sql->execute(array(
	'id' => $_GET['id']
));
$post = $sql->fetch();

echo "<h1>{$post->header}</h1>";

echo "<p>{$post->content}</p>";

// Get the post comments
$sql = $database->prepare("select * from comments where post_id=:id");
$sql->setFetchMode(PDO::FETCH_OBJ);

$sql->execute(array(
	'id' => $_GET['id']
));

echo "<h2> Comments </h2>";

while($comment = $sql->fetch()) {
	echo "<b>" . $comment->name . "</b><br />";
	echo "<p>" . $comment->content . "</p><br /><br />";
}