<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}

$id = $_GET['nid'];
$sql1 = "select * from news where news_id = $id";
$result = mysqli_query($con,$sql1);

if(isset($_POST['update']))
{
	$id = $_POST['nid'];
	$nname = $_POST['nname'];
	echo "<script>alert('$id')</script>";
	$nmessage = $_POST['nmessage'];
	
	$sql = "update news set news_name = '$nname',news_desc = '$nmessage'  where news_id = '$id'";
	mysqli_query($con,$sql);
	header('location:news.php');
}



?>
<html>
	<head>
		<title>College Info</title>
		<link rel = "stylesheet" href ="styles/style.css" media = "all">
		<style>
				table, th, td {  
					border: 1px solid black;  
					border-collapse: collapse;  
				}  
				th, td {  
					padding: 20px;  
				}  
				table tr:nth-child(even) {  
					background-color: #eee;  
				}  
				table tr:nth-child(odd) {  
					background-color: #fff;  
				}  
				table th {  
					color: white;  
					background-color: gray;  
				}  
		</style>
	</head>
	
	<body>

	     <div class = "main_wrapper">
			<div class = "header_wrapper"> 
			     <img id ="logo" src ="images/logo.jpg" />
				  <br><br><h1 style="text-align:right;">Admin Dashboard</h1>
			</div>
	
		
	
		     <div class="menubar"> 
				<ul id="menu">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<li><a href ="Admin_Dashboard.php">Home</a></li>
					<li><a href ="course.php">Course</a></li>
					<li><a href ="teacher.php">Teacher</a></li>
					<li><a href ="student.php">Student</a></li>
					<li><a href ="subject.php">Subject</a></li>
					<li><a href ="setting.php">Setting</a></li>
					<li><a href ="news.php">News</a></li>
					<li><a href ="Logout.php">LogOut</a></li>
			    </ul>
			 
			 </div>


	
			 <div class ="content_wrapper">
				<div id = "sidebar"> 
					<div id ="sidebar_title">SEARCH</div>
				       <ul id="cats">
					        <li><a href ="studentsearch.php">Student</a></li>
							<li><a href ="teachersearch.php">Teacher</a></li>
							<li><a href ="Logout.php">LogOut</a></li>
					   </ul>
                </div>
				
			  <div id = "content_area"> 
			  <br><br>  
			        <form action="newsupdate.php" method="post" name="myform">
						<center>
						<?php while($row = mysqli_fetch_array($result))
						{ ?>
						<table id="alter">
							<tr><th></th><th></th></tr>
							<tr>
									<td>NEWS NAME</td>
									<td><input type="text" value = "<?php  echo $row['news_name']; ?> "name = "nname"></td>
							</tr>
							<tr>
									<td>NESW MESSAGE</td>
									<td><input type="text" value = "<?php  echo $row['news_desc']; ?>" name = "nmessage"></td>
							
							
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "update" value="Update" style="font-size:20px; width:100px"></td>
							</tr>
						</table>
						<td><input type="hidden" value = "<?php  echo $row['news_id']; ?> "name = "nid"></td>
						<?php	} ?>
						</center>
						<br><br><br>
						

					</form>
				</div>
			 </div> 

		
			 <div id ="footer"> This is Footer</div>
			 
			</div>

	</body>
</html>