<?php
include("includes/db.php");
$sql1 = "select * from news";
$result = mysqli_query($con,$sql1);
?>
<html>
	<head>
		<title>College Info</title>
		<link rel = "stylesheet" href ="styles/style.css" media = "all">
		
		<style>
			#gallery
			{
				width:700px;
				height:50px;
				border:1px solid red;
				margin-top:20px;
				margin-left:50px;
				padding:10px;
				background:black;
				color:white;
				font-size:20px;
				
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
			 
				<div id = "content_area"> 
				 <?php
						while($row = mysqli_fetch_array($result))
							{
								echo "<div id ='gallery' /> <marquee>".$row['news_desc']."</marquee></div>";
							}			
							
							?>
				  
					
						
				</div>
				</div>
			 </div> 

		
			 <div id ="footer"> 
				<center><h2 style = "line-height:70px; color:white;">Copyright &copy; 2017-<?php echo date('Y'); ?>. <a href="YOUR_URL">Disclaimer.</a></h2></center>
			 </div>
			 
		 </div>
	</body>
</html>