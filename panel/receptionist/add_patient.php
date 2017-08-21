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

<div class="ui blue segment">

<div class="ui inverted blue segment">
  <p><b>NEW PATIENT APPOINMENT : Add new patient</b></p>
</div>

<form id='form' class="ui form" action='fun_new_patient.php' method='get'>

    <div class="three fields">
      <div class="field">
	  <label>First name</label>
        <input type="text" name="fname" placeholder="First Name">
      </div>
	  <div class="field">
	  <label>Middle name</label>
        <input type="text" name="mname" placeholder="Middle Name">
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
    <label>Blood Group</label>
	<select name="bloodgroup" class="ui fluid dropdown">
	<option value="A+">A+ve</option>
	<option value="A-">A-ve</option>
	<option value="B+">B+ve</option>
	<option value="B-">B-ve</option>
	<option value="O+">O+ve</option>
	<option value="O-">O-ve</option>
	<option value="AB+">AB+ve</option>
	<option value="AB-">AB-ve</option>
	</select>
	</div>
	
    </div>
	

    <div class="two fields">
    <div class="field">
    <label>Gender</label>
	<select name="gender" class="ui fluid dropdown">
	<option value="male">Male</option>
	<option value="female">Female</option>
	<option value="others">Others</option>
	</select>
	</div>
	
    <div class="field">
    <label>Religion</label>
    <input name="religion" placeholder="Eg : Hindu, Christian, Muslim etc..">
    </div>
	</div>
	
	<div class="two fields">
    <div class="field">
    <label>Caste</label>
	<select name="caste" class="ui fluid dropdown">
	<option value="general">General</option>
	<option value="obc">OBC</option>
	<option value="oec">OEC</option>
	<option value="sc">SC</option>
	<option value="st">ST</option>
	</select>
	</div>
	
	<div class="field">
    <label>Martial Status</label>
	<select name="martial_status" class="ui fluid dropdown">
	<option value="minor">Minor</option>
	<option value="single">Single</option>
	<option value="married">Married</option>
	<option value="divorced">Divorced</option>
	<option value="widow">Window</option>
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
 
  

	<Button type="submit" class="ui submit button">Add new patient</Button>
  <button class="ui secondary button" type="button" onclick="document.getElementById('form').reset();">Clear fields</button>
  <div class="ui error message"></div>
</form>


</div>

</body>
</html>