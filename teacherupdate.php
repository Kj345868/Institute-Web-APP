<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}

$id = $_GET['tid'];
$sql1 = "select * from teacher where tid = $id";
$result = mysqli_query($con,$sql1);

if(isset($_POST['update']))
{
	$tid = $_POST['tid'];
	$tname = $_POST['tname'];
	$tqualification = $_POST['tqualification'];
	$tfaculty = $_POST['tfaculty'];
	$tdesignation = $_POST['tdesignation'];
	$temail = $_POST['temail'];
	$tmobile = $_POST['tmobile'];
	$tgender = $_POST['tgender'];
	$taddress = $_POST['taddress'];
	
	$sql = "update teacher set tid='$tid',tname='$tname',tqualification='$tqualification',tfaculty='$tfaculty',tdesignation='$tdesignation',temail='$temail',tmobile='$tmobile',tgender='$tgender',taddress='$taddress' where tid = '$tid'";
	mysqli_query($con,$sql);
	header('location:teacher.php');
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
			        <form action="teacherupdate.php" method="post" name="myform">
						<center>
						<?php while($row = mysqli_fetch_array($result))
						{ ?>
							<center>	
						<table id="alter">
							<tr><th>FIELD</th><th>VALUE</th></tr>
							<tr>
									<td>Teacher ID</td>
									<td><input type="text" value = "<?php  echo $row['tid']; ?>" name = "tid"></td>
							</tr>
							<tr>
									<td>Teacher NAME</td>
									<td><input type="text" value = "<?php  echo $row['tname']; ?> " name = "tname"></td>
							</tr>
							<tr>
									<td>Qualification</td>
									<td><input type="text" value = "<?php  echo $row['tqualification']; ?> " name = "tqualification"></td>
							<tr>
									<td>Faculty</td>
									<td><input type="text" value = "<?php  echo $row['tfaculty']; ?> " name = "tfaculty"></td>
								
							</tr>
							<tr>
									<td>Designation</td>
									<td><input type="text" value = "<?php  echo $row['tdesignation']; ?> " name = "tdesignation"></td>
							</tr>
							<tr>
									<td>Email</td>
									<td><input type="text" value = "<?php  echo $row['temail']; ?> " name = "temail"></td>
							</tr>
							<tr>
									<td>Mobile</td>
									<td><input type="text" value = "<?php  echo $row['tmobile']; ?> " name = "tmobile"></td>
							</tr>
							<tr>
									<td>Gender</td>
									<td><input type="text" value = "<?php  echo $row['tgender']; ?> " name = "tgender"></td>
							</tr>
							<tr>
									<td>Address</td>
									<td><input type="text" value = "<?php  echo $row['taddress']; ?> " name = "taddress"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "update" value="Update" style="font-size:20px; width:100px"></td>
							</tr>
						</table>	
					</center>
						
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