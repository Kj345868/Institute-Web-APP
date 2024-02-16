<?php
include("includes/db.php");

$id = $_GET['cid'];

$sql = "delete from course where course_id = $id";

mysqli_query($con,$sql);

header('location:course.php');

?>