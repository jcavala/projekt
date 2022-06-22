<?php

include 'connect.php';
include 'website.php';
$kategorija=$_GET['id'];

style();
nav();
category($kategorija);
footer();

?>