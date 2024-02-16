<?php
session_start();
include("includes/db.php");
?>
<html>
     <title>Admin Area</title>

	  <body background="images/p3.jpg">
	  
	 <br><br> <center> <b><h3 style="font-family:Times New Roman ,courier,monospace">ADMINISTRATOR LOGIN</h3></b></center>
	<center>
	<fieldset style="width:250px; background:white;">
      <form action="index.php" method="post">				 
				 <table>
						   <tr>
									<td>User Name </td>
									 <td><input type="text" name="f1">
							</tr>
							
							<tr>
									<td>Password </td>
									 <td><input type="text" name="p1">
							</tr>
							
							<tr>
										<td colspan="2" align="center"><input type="submit" name="OK" value="Login">
							</tr>
				  </table>
			</form>
	</fieldset>
</center>
	  </body>
</html>



<?php 
if(isset($_POST['OK']))
{ 
     $name = $_POST['f1'];
	 $pass = $_POST['p1'];
	 
	 $sql = "select * from admin where UserName='$name' and password='$pass'";
	 
	 $result = mysqli_query($con,$sql);
	 
	  $n = mysqli_num_rows($result);
	  
	  if($n>0)
	  {
		  $_SESSION['name']=$name ;
         header('Location:Admin_Dashboard.php');

	  }else
	  {
		    echo "<script>alert(' Invalid User Name and password')</script>";
	  }
}

?>