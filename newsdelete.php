<?php
include("includes/db.php");

$id = $_GET['nid'];

$sql = "delete from news where news_id = $id";

mysqli_query($con,$sql);

header('location:news.php');

?>