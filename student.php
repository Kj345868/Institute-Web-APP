<?php
session_start();
include("includes/db.php");
if($_SESSION['name']==false)
{
	header("location:index.php");
}
$sql = "select * from course";
$result = mysqli_query($con,$sql);

if(isset($_POST['save']))
{
	$sid = $_POST['sid'];
	$sname = $_POST['sname'];
	$scourse= $_POST['scourse'];
	$sdate = $_POST['sdate'];
	$semail = $_POST['semail'];
	$smobile = $_POST['smobile'];
	$sgender = $_POST['sgender'];
	$sfees = $_POST['sfees'];
	$saddress = $_POST['saddress'];
	
	$sql1 = "select * from student where sid = '$sid'";
	$result = mysqli_query($con,$sql1);
	$n = mysqli_num_rows($result);
	
	if($n==1)
	{
		echo "<script>alert('Student already Exist')</script>";
	}else
	{
		$sql = "insert into student(sid,sname,sbirthdate,scourse,semail,smobile,sgender,sfees,saddress)values('$sid','$sname','$sdate','$scourse','$semail','$smobile','$sgender','$sfees','$saddress')";
		mysqli_query($con,$sql);
		echo "<script>alert('Saved')</script>";
	}
}

$sql1 = "select * from student";
$result1 = mysqli_query($con,$sql1);
?>
<html>
	<head>
		<title>College Info</title>
		<link rel = "stylesheet" href ="styles/style.css" media = "all">
		
		<script>
		
			function validateform()
			{  
					var sid=document.myform.sid.value; 
					var sname=document.myform.sname.value; 
					var semail=document.myform.semail.value;  
				    var atposition=semail.indexOf("@");  
					var dotposition=semail.lastIndexOf(".");  
				    var saddress=document.myform.saddress.value;  
					var smobile=document.myform.smobile.value; 
					var sfees=document.myform.sfees.value; 
				
					if (sid=="")
					{  
						alert("ID can't be blank");  
						return false;  
					}
					
					if (sname=="")
					{  
						alert("Name can't be blank");  
						return false;  
					}
					
					if (atposition<1 || dotposition<atposition+2 || dotposition+2>=semail.length)
						{  
							alert("Please enter a valid e-mail address");  
							return false;  
						}
						
					
					if (smobile=="")
					{  
						alert("Mobile can't be blank");  
						return false;  
					}
					
					if (isNaN(smobile))
					{  
							alert("Mobile number should be in number");
							return false;  
					}
	
					if(smobile.length != 10) 
					{
						alert("Mobile number must be 10 digits.");
						return false;
					}
					
					if ( (myform.sgender[0].checked == false ) && (myform.sgender[1].checked == false ) )
					{
						alert ( "Please choose your Gender: Male or Female" );
						return false;
					}
					if (sfees=="")
					{  
						alert("Fees can't be blank");  
						return false;  
					}
					if (saddress=="")
					{  
						alert("Address can't be blank");  
						return false;  
					}
		}  
		  
		</script>
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
			        <form name="myform" action="student.php" method="post"  onsubmit="return validateform()">
					<center>	
						<table id="alter">
							<tr><th>FIELD</th><th>VALUE</th></tr>
							<tr>
									<td>Student ID</td>
									<td><input type="text" name = "sid"></td>
							</tr>
							<tr>
									<td>Student NAME</td>
									<td><input type="text" name = "sname"></td>
							</tr>
							<tr>
									<td>Birth Date</td>
									<td><input type="date" name = "sdate"></td>
							<tr>
									<td>Course</td>
									<td>
										<select name = "scourse">
											<?php
												while($row = mysqli_fetch_array($result))
												{
													$s1 = $row['course_name'];
													echo "<option value = '$s1'>".$row['course_name']."</option>";
												}
											
											?>
										</select>
									</td>
							</tr>
						
							<tr>
									<td>Email</td>
									<td><input type="text" name = "semail"></td>
							</tr>
							<tr>
									<td>Mobile</td>
									<td><input type="text" name = "smobile"></td>
							</tr>
							<tr>
									<td>Gender</td>
									<td>
										<input type="radio" name="sgender" value="male">Male
										<input type="radio" name="sgender" value="female">Female
									</td>
							</tr>
							<tr>
									<td>Fees</td>
									<td><input type="text" name = "sfees"></td>
							</tr>
							
							<tr>
									<td>Address</td>
									<td><input type="text" name = "saddress"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "save" value="Save" style="font-size:20px; width:100px"></td>
							</tr>
						</table>	
							</form>
					</center>
					<table id="alter">
							<tr><th>Name</th><th>Course</th><th>Email</th><th>Mobile</th><th>Gender</th><th>Fees</th><th>Address</th><th>UPDATE</th><th>DELETE</th></tr>
							
							<?php
								while($row = mysqli_fetch_array($result1))
								{
									$id = $row['sid'];
									echo "<tr>";
									echo "<td>".$row['sname']."</td>";
									echo "<td>".$row['scourse']."</td>";
									echo "<td>".$row['semail']."</td>";
									echo "<td>".$row['smobile']."</td>";
									echo "<td>".$row['sgender']."</td>";
									echo "<td>".$row['sfees']."</td>";
									echo "<td>".$row['saddress']."</td>";
									echo "<td><a href='studentupdate.php?sid=$id'>UPDATE</a></td>";
									echo "<td><a href='studentdelete.php?sid=$id'>Delete</a></td>";
									echo "</tr>";
								}
							?>
							
						</table>
				
				</div>
			 </div> 

		
			 <div id ="footer"> This is Footer</div>
			 
			</div>

	</body>
</html>