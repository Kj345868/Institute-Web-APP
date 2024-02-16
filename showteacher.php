<?php
session_start();
include("includes/db.php");


$id = $_GET['tid'];
$sql1 = "select * from teacher where tid = $id";
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