<?php
require_once 'header.php';
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

require 'comments.php';
require_once 'footer.php';