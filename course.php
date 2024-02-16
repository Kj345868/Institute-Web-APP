<?php
include("includes/db.php");
$sql1 = "select * from course";
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
					background-color: #5f9ea0;  
				}  
		</style>
	</head>
	
	<body>

	     <div class = "main_wrapper">
			<div class = "header_wrapper"> 
			     <img id ="logo" src ="images/College.png" />
				 
			</div>
			<div class="menubar"> 
				<ul id="menu">
					<li><a href = "index.php">Home<a></li>
					<li><a href = "course.php">Course<a></li>
					<li><a href = "teacher.php">Teacher<a></li>
					<li><a href = "gallery.php">Gallery <a></li>
					<li><a href = "info.php">NEWS <a></li>
					<li><a href = "admin_area/index.php"> Admin<a></li>
				</ul>
			 </div>
			
			<div class ="content_wrapper">
				<div id = "sidebar">
				  <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
				    <b style = "font-size:22px;color:red;font-family:Arial;">Address:</b><br>
					Burudgaon Rd, Near ITI, Bhavani Nagar, Ahmednagar, Maharashtra 414001</b>
				</marquee>
				</div>
			 
				<div id = "content_area"> <br><br><br>
				<center>
				   <table id="alter">
							<tr><th>COURSE NAME</th><th>COURSE DURATION</th><th>COURSE FEES</th></tr>
							<?php
								while($row = mysqli_fetch_array($result))
								{
									$id = $row['course_id'];
									$name = $row['course_name'];
									echo "<tr>";
									echo "<td><a href = 'Subject.php?cname=$name'>".$row['course_name']."</a></td>";
									echo "<td>".$row['course_duration']."</td>";
									echo "<td>".$row['course_fees']."</td>";
									echo "</tr>";
								}
							?>
						
					</table>
					<center>
				</div>
			 </div> 

		
			 <div id ="footer"> 
				<center><h2 style = "line-height:70px; color:white;">Copyright &copy; 2017-<?php echo date('Y'); ?>. <a href="YOUR_URL">Disclaimer.</a></h2></center>
			 </div>
			 
		 </div>
	</body>
</html>