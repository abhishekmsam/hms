<?php 
		session_start();
		if (!isset($_SESSION['username'])) 
		{
			echo "<script type='text/javascript'>window.location = '/hms/login.php?status=44'</script>";
		}
 ?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8' />
    <title>Reception Panel</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css'/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js'></script>
	<script>
		function addPatient()
		{
			$(document).ready(function(){$("#employe").load("add_patient.php");});
			document.getElementById('addemploye').className = 'item active';
			document.getElementById('editemploye').className = 'item';
			document.getElementById('manageemploye').className = 'item';
		}
		function editEmploye()
		{
			$(document).ready(function(){$("#employe").load("edit_employe.php");});
			document.getElementById('addemploye').className = 'item';
			document.getElementById('editemploye').className = 'item active';
			document.getElementById('manageemploye').className = 'item';
		}
		function manageEmploye()
		{
			$(document).ready(function(){$("#employe").load("manage_employe.php");});
			document.getElementById('addemploye').className = 'item';
			document.getElementById('editemploye').className = 'item';
			document.getElementById('manageemploye').className = 'item active';
		}
	</script>
	<script>
		$(document).ready(function(){$("#employe").load("add_patient.php");});
	</script>
	<style>
	.boxmargin
	{
		margin: 3% 3% 3% 3%;
	}
	.topmargin
	{
		margin: 3.5% 0% 0% 0%;
	}
	body
	{
		background:
		radial-gradient(black 15%, transparent 16%) 0 0,
		radial-gradient(black 15%, transparent 16%) 8px 8px,
		radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 0 1px,
		radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 8px 9px;
		background-color:#282828;
		background-size:16px 16px;
	}
	</style>
</head>

<body>
<div class='boxmargin'/>

<div class='ui segments'>

<?php
	include '../../static/database.php';
	$sql = "SELECT value FROM meta WHERE name='app_name';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		$row =mysqli_fetch_assoc($result);
		echo "<div class='ui segment'><h3 class='ui centered header'>".$row['value'];
	}
	$sql = "SELECT value FROM meta WHERE name='app_version';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		$row =mysqli_fetch_assoc($result);
		echo "<font color=red> ".$row['value']."</font></h3></div>";
	}
    mysqli_close($connection);
?>

  
<div class='ui secondary segment'>
<h3 class='ui centered header'>
	Reception Dashboard
	<div class='sub centered header'>Continue other departments</div>
</h3>

<form class='ui form' action='/hms/static/login_gate.php' method='post'>
  <div class='field'>
    <img class='ui tiny centered image' src='/hms/drawable/main_icon_reception.png'>
  </div>
</form>


<div class="ui secondary pointing menu">
  <a class="active item">
    Patients
  </a>
  <a class="item" onclick="location.href = '/hms/panel/admin/departments.php';">
    Appoinments
  </a>
  <a class="item">
    Doctors
  </a>
   <a class="item">
    Enquiry
  </a>
  <div class="right menu">
    <a class="ui item">
      Help Desk
    </a>
	<a class="ui item" onclick="location.href = '/../../hms/static/logout_gate.php';"><font color='red'>
	Logout
    </font></a>
  </div>
</div>


<?php
		if (isset($_GET['status'])) 
		{
			$status=$_GET['status'];
			if ($status=="20") 
			{
				echo "<div class='ui green message'><i class='close icon'></i>New employe succesfully registered</div>";
			}
			else if ($status=="21") 
			{
				echo "<div class='ui green message'><i class='close icon'></i>Employee deleted succesfully</div>";
			}
			else if ($status=="22") 
			{
				echo "<div class='ui green message'><i class='close icon'></i>Account halted succesfully</div>";
			}
			else if ($status=="23") 
			{
				echo "<div class='ui green message'><i class='close icon'></i>Account unhalted succesfully</div>";
			}
		}
?>

	<script>
		$(document).ready(function(){$("#employe").load("add_employe.php");});
		$('.message .close').on('click', function() {$(this).closest('.message').transition('fade');});
	</script>
	
<div class="ui segment">

<div class="ui menu">
  <div class="header item">
	<?php
	include '../../static/database.php';
	$sql = "SELECT * FROM employee WHERE email='".$_SESSION['username']."' AND password='".$_SESSION['password']."';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		$row =mysqli_fetch_assoc($result);
		echo "<font color='blue' face='arial'>".strtoupper($row['fname'])." ".strtoupper($row['lname'])."</font>";
	}
    mysqli_close($connection);
	?>
	
  </div>
  <a class="item active" id="addemploye" onclick="addPatient();">
    New Appoinment
  </a>
  <a class="item" id="editemploye" onclick="editEmploye();">
    Renew Appoinment
  </a>
   <a class="item" id="manageemploye" onclick="manageEmploye();">
    Manage Appoinments
  </a>
</div>

<div id="employe"></div>

</div>





</div>
</div>

</body>
</html>