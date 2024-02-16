<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}
$status = "";

if(isset($_POST['update']))
{
	$npass = $_POST['npass'];
	$opass = $_POST['opass'];
	$cpass = $_POST['cpass'];
	
	if($npass!=$cpass)
	{
		$status = "Password And Confirm Password Should be same";
	}else
	{
		 mysqli_query($con,"UPDATE admin SET password='$npass' WHERE password = '$opass'");
		if(mysqli_affected_rows($con)== 1)
		{
		$status = "Password updated successfully..";
		}
		else
		{
		$status = "Failed to update Password";
		}
	}
}
?>
<html>
	<head>
		<title>College Info</title>
		
		<link rel = "stylesheet" href ="styles/style.css" media = "all">
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
			        <form action="setting.php" method="post" name="myform">
					<center>	
					   <?php 
						echo $status;	
					?>	
						<table id="alter">
							<tr><th></th><th></th></tr>
							<tr>
									<td>Old Password</td>
									<td><input type="text" name = "opass"></td>
							</tr>
							<tr>
									<td>New Password</td>
									<td><input type="text" name = "npass"></td>
							<tr>
									<td>Confirm Password</td>
									<td><input type="text" name = "cpass"></td>
							</tr>
							
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "update" value="Update Password" style="font-size:16px; width:170px"></td>
							</tr>
						</table>
					</center>
					</form>
				</div>
			 </div> 

		
			 <div id ="footer"> This is Footer</div>
			 
			</div>

	</body>
</html>