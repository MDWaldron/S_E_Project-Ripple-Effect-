<?php
	include('../config.php');
	include('../session.php');
?>

<html>
	<head>
		<title> Ripple Effect </title>
		<body bgcolor="#bfbfbf">
			<h1 align= "center"><font size="24"> Ripple Effect</font></h1>
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
<!-- CSS styles for standard search box -->
<style type="text/css">
#tfheader{
		background-color:#bfbfbf;
	}
	#tfnewsearch{
		float:left;
	}
	.tftextinput{
		margin: 0;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
	}
	.tfbutton {
		margin: 0;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		background: #0095cd;
		background: -webkit-gradient(linear, left top, left bottom, from(#00adee), to(#0078a5));
		background: -moz-linear-gradient(top,  #00adee,  #0078a5);
	}
	.tfbutton:hover {
		text-decoration: none;
		background: #007ead;
		background: -webkit-gradient(linear, left top, left bottom, from(#0095cc), to(#00678e));
		background: -moz-linear-gradient(top,  #0095cc,  #00678e);
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
	.vendorimages{
		position: relative;
		top: 50px;
	}
</style>
</form>
</head>
<body>
	<div class="tfclear">
		<!-- Logout-->
		<form action="Logout.php">
		<button type="submit" formaction="../Logout.php" style="float: right;">logout</button></form>

	</div>
	<!-- HTML for SEARCH BAR -->
	<div id="tfheader">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for vendor..">
	</div>
	<div class="vendorimages">
		<form action="" method = "get">
			<!--
			<table id="myTable">
				
				<tr><th valign="top"><img src="/icons/blank.gif" alt="[ICO]"></th>
				<th><a href="?C=N;O=D">Name</a></th>
				<th><a href="?C=M;O=A">Service Type</a></th>
				<th><a href="?C=S;O=A">Price</a></th>
				<th><a href="?C=D;O=A">Location</a></th>
				<tr><th colspan="5"><hr></th></tr>
				<td><button name= "Service" type="submit" value = "Service1";><img src="Vendor.jpg" style="width:50px;height:50px;"/></button></td>
				</tr>
				
			</table>
			-->


<?php    
	$sql = "SELECT V_Name, V_Address, V_Phone_Number, V_Service FROM vendor";
	$result = mysqli_query($db, $sql) or die(mysql_error());
		echo "<table>";
		while($row = mysqli_fetch_assoc($result)){
			$VName = $row['V_Name'];
			$VAddress = $row['V_Address'];
			$VPN = $row['V_Phone_Number'];
			$VService = $row['V_Service'];
		echo "<tr><td>".$VName."</td><td>".$VAddress."</td><td>".$VPN."</td><td>".$VService."</td></tr>";   
		}
		echo "</table>";
?>
		
		</form>

		
<!--
<?php
	if($_SERVER["REQUEST_METHOD"] == "GET"){
    $V_Name = mysqli_real_escape_string($db,$_GET['V_Service']);
    $sql = "SELECT * FROM 'VENDOR' WHERE V_Name = '$'";
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count !=0) {
     $_SESSION['VENDOR'] = $V_Name;
     header("location: ../ChooseVendor.php");
 }
}
?>
-->

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</div>
</body>
</html>