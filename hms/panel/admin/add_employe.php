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
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
	<script>
		$('.ui.dropdown').dropdown();
		$('.tag.example .ui.dropdown').dropdown({
			allowAdditions: true
		});
	</script>
	<style>
	.boxmargin
	{
		margin: 3% 3% 3% 3%;
	}
	.topmargin
	{
		margin: 1% 0% 0% 0%;
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

<div class="ui green segment">

<div class="ui inverted green segment">
  <p><b>ADD EMPLOYEE : Add a new employee by filling up the form</b></p>
</div>

<form id='form' class="ui form" action='fun_new_employe.php' method='get'>

    <div class="two fields">
      <div class="field">
	  <label>First name</label>
        <input type="text" name="fname" placeholder="First Name">
      </div>
      <div class="field">
	  <label>Last name</label>
        <input type="text" name="lname" placeholder="Last Name">
      </div>
    </div>

    <div class="field">
    <label>Address</label>
    <input type="text" name="address" placeholder="Eg : Housename, Locality, Place, State, Nation">
    </div>


    <div class="two fields">
    <div class="field">
    <label>Date Of Birth</label>
    <input type="date" name="dob" placeholder="Eg : 28/10/1996">
    </div>
    <div class="field">
    <label>Date Of Joining</label>
    <input type="date" name="doj" placeholder="Eg : 28/10/1996">
    </div>
    </div>
	

    <div class="two fields">
    <div class="field">
    <label>Gender</label>
	<select name="gender" class="ui fluid dropdown">
	<option value="male">Male</option>
	<option value="female">Female</option>
	</select>
	</div>
    <div class="field">
    <label>Designation</label>
	<select name="designation" class="ui fluid multiple search selection dropdown">
	<option value="">Doctor</option>
<?php
	include '\..\..\static\database.php';
	$sql = "SELECT DISTINCT designation FROM employee;";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
			echo "<option value='".strtolower($row['designation'])."'>".ucwords($row['designation'])."</option>";
		}		
	}
    mysqli_close($connection);
?>
	
	</select>
	</div>
    </div>
	
	
    <div class="two fields">
    <div class="field">
    <label>Contact Number</label>
    <input type="number" name="contact" placeholder="Eg : 9495661468">
    </div>
    <div class="field">
    <label>Email Address</label>
    <input type="email" name="email" placeholder="Eg : someone@domain.com">
    </div>
    </div>
 
<div class="field">
<label>Specialisation</label>
<select name="specialisation" class="ui fluid search dropdown">
<option value="">Physitian</option>
<?php
	include '\..\..\static\database.php';
	$sql = "SELECT DISTINCT specialisation FROM employee;";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
			echo "<option value='".strtolower($row['specialisation'])."'>".ucwords($row['specialisation'])."</option>";
		}		
	}
    mysqli_close($connection);
?>
</select>
</div>
  
	
    <div class="field">
    <label>Password</label>
    <input type="password" name="password" placeholder="Initial password">
  </div>
  

  <div class="ui submit button">Add new employee</div>
  <button class="ui secondary button" type="button" onclick="document.getElementById('form').reset();">Clear fields</button>
  <div class="ui error message"></div>
</form>


</div>

</body>
</html>