<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}
$status = "";
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
			        <form action="studentsearch.php" method="post" name="myform">
						<center>
						<?php echo $status; ?>
						<table id="alter">
							<tr><th></th><th></th></tr>
							<tr>
									<td>Student ID</td>
									<td><input type="text" name = "sid"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "search" value="Search" style="font-size:20px; width:100px"></td>
							</tr>
						</table>
						</center><br><br>
						
<?php
if(isset($_POST['search']))
{
	$sid = $_POST['sid'];
	
	$sql = "select * from student where sid = '$sid'";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	
	if($count==0)
	{
		echo "<script>alert('Student Not Exist')</script>"; 
	}else
	{
		echo "<table><tr><th>Name</th><th>Birth Date</th><th>Course</th><th>Email</th><th>Mobile</th><th>Gender</th><th>Fess</th><th>Address</th><th>UPDATE</th><th>DELETE</th></tr>";
			while($row = mysqli_fetch_array($result))
				{
					$sid = $row['sid'];
					echo "<tr>";
					echo "<td>".$row['sname']."</td>";
					echo "<td>".$row['sbirthdate']."</td>";
					echo "<td>".$row['scourse']."</td>";
					echo "<td>".$row['semail']."</td>";
					echo "<td>".$row['smobile']."</td>";
					echo "<td>".$row['sgender']."</td>";
					echo "<td>".$row['sfees']."</td>";
					echo "<td>".$row['saddress']."</td>";
					echo "<td><a href='studentupdate.php?sid=$sid'>UPDATE</a></td>";
					echo "<td><a href='studentdelete.php?sid=$sid'>Delete</a></td>";
					echo "</tr>";
				}
		echo "</table>";
	}	
}
?>
</form>
				</div>
			 </div> 

		
			 <div id ="footer"> This is Footer</div>
			 
			</div>

	</body>
</html>