<?php
include 'connect.php';
include 'website.php';
$id=$_GET['id'];
$query = "SELECT * FROM vijesti WHERE id=$id";
$GLOBALS['result'] = mysqli_query($GLOBALS['con'], $query);
style();
nav();
clanak();
footer();
?>

