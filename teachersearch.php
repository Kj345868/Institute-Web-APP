<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
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
			        <form action="teachersearch.php" method="post" name="myform">
						<center>
						
						<table id="alter">
							<tr><th></th><th></th></tr>
							<tr>
									<td>Teacher ID</td>
									<td><input type="text" name = "tid"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "search" value="Search" style="font-size:20px; width:100px"></td>
							</tr>
						</table>
						</center><br><br>
						
<?php
if(isset($_POST['search']))
{
	$tid = $_POST['tid'];
	
	$sql = "select * from teacher where tid = '$tid'";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	
	if($count==0)
	{
		echo "<script>alert('Teacher Not Exist')</script>"; 
	}else
	{
		echo "<table><tr><th>Name</th><th>Qualification</th><th>Faculty</th><th>Designation</th><th>Email</th><th>Mobile</th><th>Gender</th><th>Address</th><th>UPDATE</th><th>DELETE</th></tr>";
			while($row = mysqli_fetch_array($result))
				{
					$tid = $row['tid'];
					echo "<tr>";
					echo "<td>".$row['tname']."</td>";
					echo "<td>".$row['tqualification']."</td>";
					echo "<td>".$row['tfaculty']."</td>";
					echo "<td>".$row['tdesignation']."</td>";
					echo "<td>".$row['temail']."</td>";
					echo "<td>".$row['tmobile']."</td>";
					echo "<td>".$row['tgender']."</td>";
					echo "<td>".$row['taddress']."</td>";
					echo "<td><a href='teacherupdate.php?tid=$tid'>UPDATE</a></td>";
					echo "<td><a href='teacherdelete.php?tid=$tid'>Delete</a></td>";
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