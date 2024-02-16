<?php
include("includes/db.php");

$id = $_GET['sid'];

$sql = "delete from student where sid = $id";

mysqli_query($con,$sql);

header('location:student.php');

?>