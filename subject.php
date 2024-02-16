<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}

if(isset($_POST['save']))
{
	$cname = $_POST['cname'];
	$semister = $_POST['semister'];
	$subject = $_POST['subject'];
	
	$sql1 = "select * from subject where Course_semister = '$semister' and Course_subject = '$subject'";
	$result = mysqli_query($con,$sql1);
	$n = mysqli_num_rows($result);
	if($n==1)
	{
		echo "<script>alert('Semister and subject already Exist')</script>";
	}else
	{
		$sql = "insert into subject(Course_name,Course_Semister,Course_subject)values('$cname','$semister','$subject')";
		mysqli_query($con,$sql);
		echo "<script>alert('Data Saved')</script>";
	}
}

$sql2 = "select * from course";
$result1 = mysqli_query($con,$sql2);

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
			        <form action="subject.php" method="post" name="myform">
						<center>
						<table id="alter">
							<tr><th></th><th></th></tr>
							<tr>
									<td>COURSE NAME</td>
									<td>
										<select name = "cname">
										<?php
											while($row = mysqli_fetch_array($result1))
											{
												$sub = $row['course_name'];
												echo "<option value = '$sub'>".$row['course_name']."</option>";
											}
										?>
										</select>
									</td>
							</tr>
							<tr>
									<td>SEMISTAR</td>
									<td>
										<select name="semister">
											<option value="First">First</option>
											<option value="Second">Second</option>
											<option value="Third">Third</option>
											<option value="Fourth">Fourth</option>
											<option value="Fifth">Fifth</option>
											<option value="Sixth">Sixth</option>
										</select>
									</td>
							<tr>
									<td>SUBJECT</td>
									<td><input type="text" name = "subject"></td>
							</tr>
							
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "save" value="Save" style="font-size:20px; width:100px"></td>
							</tr>
						</table>
						</center>
						<br><br><br>
					
					</form>
				</div>
			 </div> 

		
			 <div id ="footer"> This is Footer</div>
			 
			</div>

	</body>
</html>