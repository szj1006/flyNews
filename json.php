<?php
include 'function.php';
$date = $_GET['date'];
$id = $_GET['id'];
echo curl("http://reader.res.meizu.com/reader/articlecontent/$date/$id.json");
?>