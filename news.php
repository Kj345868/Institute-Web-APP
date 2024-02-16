<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}

if(isset($_POST['save']))
{
	$nname = $_POST['nname'];
	$nmessage = $_POST['nmessage'];

	$sql = "insert into news(news_name,news_desc)values('$nname','$nmessage')";
	mysqli_query($con,$sql);
	echo "<script>alert('Saved')</script>";
	
}

$sql1 = "select * from news";
$result = mysqli_query($con,$sql1);


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
			        <form action="news.php" method="post" name="myform">
						<center>
						<table id="alter">
							<tr><th></th><th></th></tr>
							<tr>
									<td>News NAME</td>
									<td><input type="text" name = "nname"></td>
							</tr>
							<tr>
									<td>Message</td>
									<td><textarea name="nmessage" rows="4" cols="50"></textarea></td>
							
							
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "save" value="Set News" style="font-size:20px; width:100px"></td>
							</tr>
						</table>
						</center>
						<br><br><br>
						<table id="alter">
							<tr><th>NEWS NAME</th><th>NEWS MESSAGE</th><th>UPDATE</th><th>DELETE</th></tr>
							
							<?php
								while($row = mysqli_fetch_array($result))
								{
									$id = $row['news_id'];
									echo "<tr>";
									echo "<td>".$row['news_name']."</td>";
									echo "<td>".$row['news_desc']."</td>";
									echo "<td><a href='newsupdate.php?nid=$id'>UPDATE</a></td>";
									echo "<td><a href='newsdelete.php?nid=$id'>Delete</a></td>";
									echo "</tr>";
								}
							?>
							
						</table>

					</form>
				</div>
			 </div> 

		
			 <div id ="footer"> This is Footer</div>
			 
			</div>

	</body>
</html>