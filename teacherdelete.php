<?php
include("includes/db.php");

$id = $_GET['tid'];

$sql = "delete from teacher where tid = $id";

mysqli_query($con,$sql);

header('location:teacher.php');

?>