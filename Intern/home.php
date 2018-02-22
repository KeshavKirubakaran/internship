<?php
session_start(); 
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<title>Registration</title>
<script type="text/javascript">
    function noBack() { window.history.forward(); }
    noBack();
    window.onload = noBack;
    window.onpageshow = function (evt) { if (evt.persisted) noBack(); }
    window.onunload = function () { void (0); }
</script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
		<ul>
		<a class="navbar-brand" href="#">
			<img src="user.png" width="50px;" height="50px;"> 

			
		</a>
		</ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
      <a class="nav-link " href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
	<div class="container-fluid jumbotron"><br><br>
		<center>
			<?php 
			
			echo "<p>Welcome  ".$_SESSION["username"]."</p>";
			?> 
		<h4>Registered Users</h4><br>
	</center>
<?php
$con=mysqli_connect("localhost","root","shuttle","testReg");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM registerData");

echo "<table class='table-striped table-hover' height='100%' width='100%'>
<tr class='table-primary'>
<th>Firstname</th>
<th>Lastname</th>
<th>Phone</th>
<th>mail</th>
<th>experience</th>
<th>primary skill</th>
<th>secondary skill</th>
<th>current ctc</th>
<th>secondary ctc</th>
<th>reason for change</th>
<th>notice period</th>
<th>offers in hand</th>
<th>cuurent location</th>
<th>previous location</th>
<th>proof</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['mail'] . "</td>";
echo "<td>" . $row['experience'] . "</td>";
echo "<td>" . $row['primaryskill'] . "</td>";
echo "<td>" . $row['secondaryskill'] . "</td>";
echo "<td>" . $row['currentctc'] . "</td>";
echo "<td>" . $row['expectedctc'] . "</td>";
echo "<td>" . $row['reasonforchange'] . "</td>";
echo "<td>" . $row['noticeperiod'] . "</td>";
echo "<td>" . $row['offersinhand'] . "</td>";
echo "<td>" . $row['currentlocation'] . "</td>";
echo "<td>" . $row['previouslocation'] . "</td>";
echo "<td>" . $row['document'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</div>
</body>
</html>