<?php
require_once 'header.php';
require 'config.php';

// Check if you tried to post something
if(isset($_POST['name']) && isset($_POST['comment'])) {
	$sql = $database->prepare("INSERT INTO comments (post_id, name, content) VALUES (:id, :name, :content)");
	$sql->execute(array(
		'id' => $_GET['id'],
		'name' => $_POST['name'],
		'content' => $_POST['comment']
	));
}

// Get the post comments
$sql = $database->prepare("select * from comments where post_id=:id");
$sql->setFetchMode(PDO::FETCH_OBJ);

$sql->execute(array(
	'id' => $_GET['id']
));

echo "<h2> Comments </h2>";

while($comment = $sql->fetch()) {
	echo "<b>" . $comment->name . "</b><br />";
	echo "<p>" . $comment->content . "</p><br />";
}

?>

<form method="post">
	<input type="textbox" name="name" placeholder="Your name"/> <br />	
	<b> Comment: </b><br />
	<textarea name="comment"></textarea> <br />
	<input type="submit" />
</form>

<?php
	require_once 'footer.php';
?>