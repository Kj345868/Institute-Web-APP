<html>
	<head>
		<title>College Info</title>
		
		<link rel = "stylesheet" href ="styles/style.css" media = "all">
		<style>
			#gallery
			{
				width:230px;
				height:200px;
				display: inline;
				
				padding:10px;
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
				     <img id ="gallery" src ="images/Image1.png" width="800px"/>
					 <img id ="gallery" src ="images/Image2.png" width="800px"/>
					 <img id ="gallery" src ="images/Image3.png" width="800px"/>
					 <img id ="gallery" src ="images/Image4.png" width="800px"/>
					 <img id ="gallery" src ="images/Image5.png" width="800px"/>
					 <img id ="gallery" src ="images/Image6.png" width="800px"/>
					 <img id ="gallery" src ="images/Image7.png" width="800px"/>
					 <img id ="gallery" src ="images/Image8.png" width="800px"/>
						
				</div>
			 </div> 

		
			 <div id ="footer"> 
				<center><h2 style = "line-height:70px; color:white;">Copyright &copy; 2017-<?php echo date('Y'); ?>. <a href="YOUR_URL">Disclaimer.</a></h2></center>
			 </div>
			 
		 </div>
	</body>
</html>