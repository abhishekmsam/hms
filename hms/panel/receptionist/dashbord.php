<!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8' />
    <title>Login Panel</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css'/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js'></script>
	<style>
	.boxmargin
	{
		margin: 5% 35% 5% 35%;
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
	include '\static\database.php';
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
	LogIn Platform
	<div class='sub centered header'>Please authenticate to continue</div>
</h3>

<form class='ui form' action='\hms\static\login_gate.php' method='post'>
  <div class='field'>
    <img class='ui tiny centered image' src='/hms/drawable/main_icon_login.png'>
  </div>
  <div class='field' id='errorset'>
    <input type='text' id='username' name='username' placeholder='Username'>
  </div>
  <div class='field'>
    <input type='password' id='password' name='password' placeholder='Password'>
  </div>
  <div class='field'>
	<div class='ui label'>Forgot password</div>
  </div>
  <div class='topmargin'/>
  <div class='field'>
  <button class='ui primary button'>LogIn</button>
  <button class='ui button'>Clear fields</button>
  </div>  
 
<?php
		if (isset($_GET['status'])) 
		{
			$status=$_GET['status'];
			if ($status=="40") 
			{
				echo "<div class='ui orange message'>Error 40 : Invalid username or password</div>";
			}
			else if ($status=="41") 
			{
				echo "<div class='ui green message'>Error 41 : Your account is temporarly suspended</div>";
			}
			else if ($status=="42") 
			{
				echo "<div class='ui blue message'>Error 42 : You need to activate this account</div>";
			}
		}
 ?>

</form>
</div>
</div>

</body>
</html>