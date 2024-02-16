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
	$tid = $_POST['tid'];
	$tname = $_POST['tname'];
	$tqualification = $_POST['tqualification'];
	$tfaculty = $_POST['tfaculty'];
	$tdesignation = $_POST['tdesignation'];
	$temail = $_POST['temail'];
	$tmobile = $_POST['tmobile'];
	$tgender = $_POST['tgender'];
	$taddress = $_POST['taddress'];
	
	$sql1 = "select * from teacher where tid = '$tid'";
	$result = mysqli_query($con,$sql1);
	$n = mysqli_num_rows($result);
	
	if($n==1)
	{
		echo "<script>alert('Teacher already Exist')</script>";
	}else
	{
		$sql = "insert into teacher(tid,tname,tqualification,tfaculty,tdesignation,temail,tmobile,tgender,taddress)values('$tid','$tname','$tqualification','$tfaculty','$tdesignation','$temail','$tmobile','$tgender','$taddress')";
		mysqli_query($con,$sql);
		echo "<script>alert('Saved')</script>";
	}
}

$sql1 = "select * from teacher";
$result1 = mysqli_query($con,$sql1);
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
		
		<script>
		
			function validateform()
			{  
					var tid=document.myform.tid.value; 
					var tname=document.myform.tname.value; 
					var tqualification=document.myform.tqualification.value;  
					var tfaculty=document.myform.tfaculty.value;
					var tdesignation=document.myform.tdesignation.value; 	
					var temail=document.myform.temail.value;  
				    var atposition=temail.indexOf("@");  
					var dotposition=temail.lastIndexOf(".");  
				    var taddress=document.myform.taddress.value;  
					var tmobile=document.myform.tmobile.value; 
				
					if (tid=="")
					{  
						alert("ID can't be blank");  
						return false;  
					}
					
					if (tname=="")
					{  
						alert("Name can't be blank");  
						return false;  
					}
					
					if (tqualification=="")
					{  
						alert("tqualification can't be blank");  
						return false;  
					}
					
					if (atposition<1 || dotposition<atposition+2 || dotposition+2>=temail.length)
						{  
							alert("Please enter a valid e-mail address");  
							return false;  
						}
						
					
					if (tmobile=="")
					{  
						alert("Mobile can't be blank");  
						return false;  
					}
					
					if (isNaN(tmobile))
					{  
							alert("Mobile number should be in number");
							return false;  
					}
	
					if(tmobile.length != 10) 
					{
						alert("Mobile number must be 10 digits.");
						return false;
					}
					
					if ( (myform.tgender[0].checked == false ) && (myform.tgender[1].checked == false ) )
					{
						alert ( "Please choose your Gender: Male or Female" );
						return false;
					}
					if (taddress=="")
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
			        <form name="myform" action="teacher.php" method="post"  onsubmit="return validateform()">
					<center>	
						<table id="alter">
							<tr><th>FIELD</th><th>VALUE</th></tr>
							<tr>
									<td>Teacher ID</td>
									<td><input type="text" name = "tid"></td>
							</tr>
							<tr>
									<td>Teacher NAME</td>
									<td><input type="text" name = "tname"></td>
							</tr>
							<tr>
									<td>Qualification</td>
									<td><input type="text" name = "tqualification"></td>
							<tr>
									<td>Faculty</td>
									<td>
										<select name = "tfaculty">
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
									<td>Designation</td>
									<td>
										<select name="tdesignation">
											<option value="Principle">Principle</option>
											<option value="HOD">HOD</option>
											<option value="Professor">Professor</option>
											<option value="Other">Other</option>
										</select>
									</td>
							</tr>
							<tr>
									<td>Email</td>
									<td><input type="text" name = "temail"></td>
							</tr>
							<tr>
									<td>Mobile</td>
									<td><input type="text" name = "tmobile"></td>
							</tr>
							<tr>
									<td>Gender</td>
									<td>
										<input type="radio" name="tgender" value="male">Male
										<input type="radio" name="tgender" value="female">Female
									</td>
							</tr>
							<tr>
									<td>Address</td>
									<td><input type="text" name = "taddress"></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit" name = "save" value="Save" style="font-size:20px; width:100px"></td>
							</tr>
						</table>	
							</form>
					</center>
					<br><br>
					<table id="alter">
							<tr><th>ID</th><th>Name</th><th>Qualification</th><th>Faculty</th><th>Designation</th><th>Email</th><th>Mobile</th><th>Gender</th><th>Address</th><th>UPDATE</th><th>DELETE</th></tr>
							
							<?php
								while($row = mysqli_fetch_array($result1))
								{
									$id = $row['tid'];
									echo "<tr>";
									echo "<td>".$row['tid']."</td>";
									echo "<td>".$row['tname']."</td>";
									echo "<td>".$row['tqualification']."</td>";
									echo "<td>".$row['tfaculty']."</td>";
									echo "<td>".$row['tdesignation']."</td>";
									echo "<td>".$row['temail']."</td>";
									echo "<td>".$row['tmobile']."</td>";
									echo "<td>".$row['tgender']."</td>";
									echo "<td>".$row['taddress']."</td>";
									echo "<td><a href='teacherupdate.php?tid=$id'>UPDATE</a></td>";
									echo "<td><a href='teacherdelete.php?tid=$id'>Delete</a></td>";
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