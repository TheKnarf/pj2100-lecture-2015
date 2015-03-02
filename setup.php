<?php

require 'config.php';

// Create the table: blog
$sql = $database->prepare(
	"CREATE TABLE blog (id int NOT NULL AUTO_INCREMENT, header varchar(255), content varchar(255), PRIMARY KEY (id));"
);
$sql->execute();

// Create the table: comments
$sql = $database->prepare(
	"CREATE TABLE comments (id int NOT NULL AUTO_INCREMENT, post_id int NOT NULL, name varchar(255), content varchar(255), PRIMARY KEY (id), FOREIGN KEY (post_id) REFERENCES Blog(id));"
);
$sql->execute();

// Add some example content to the database
$sql = $database->prepare(
	"INSERT INTO blog (header, content) VALUES (:header, :content);"
);
$sql->execute(array(
	'header' => "Skandale!",
	'content' => "#blueandblack"
));


echo "Created blog table";
