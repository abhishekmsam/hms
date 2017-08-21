<?php 
		session_start();
			
		if (!isset($_SESSION['username'])) 
		{
			echo "<script type='text/javascript'>window.location = '/hms/login.php?status=44'</script>";
		}
		if (isset($_GET["id"])) 
		{
			$id=$_GET["id"];
			$_SESSION['id']=$id;
	include '../../static/database.php';
	$sql = "SELECT * FROM employee WHERE emp_id='$id';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$address=$row['address'];
			$dob=$row['dob'];
			$gender=$row['gender'];
			$designation=$row['designation'];
			$doj=$row['doj'];
			$contact=$row['contact'];
			$email=$row['email'];
			$specialisation=$row['specialisation'];
			$password=$row['password'];
			
			
		}		
	}
    mysqli_close($connection);

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
	<!-- cancel the editing  @jemshid -->
	<script>
	function cancel()
	{
		$('#employe').load('edit_employe.php');
	}
	</script>
</head>

<body>

<div class="ui pink segment">

<div class="ui inverted pink segment">
  <p><b>UPDATE EMPLOYEE DETAILS : Fill up latest employee details and update the account</b></p>
</div>

<form id='form' class="ui form" action='fun_update_employe.php?' method='get'>

    <div class="two fields">
      <div class="field">
	  <label>First name</label>
        <input type="text" name="fname" value=<?php echo $fname; ?>  placeholder="First Name">
      </div>
      <div class="field">
	  <label>Last name</label>
        <input type="text" name="lname"  value=<?php echo $lname; ?> placeholder="Last Name">
      </div>
    </div>

    <div class="field">
    <label>Address</label>
    <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Eg : Housename, Locality, Place, State, Nation">
    </div>

    <div class="two fields">
    <div class="field">
    <label>Date Of Birth</label>
    <input type="date" name="dob" value=<?php echo $dob; ?> placeholder="Eg : 28/10/1996">
    </div>
    <div class="field">
    <label>Date Of Joining</label>
    <input type="date" name="doj" value=<?php echo $doj; ?> placeholder="Eg : 28/10/1996">
    </div>
    </div>
	

    <div class="two fields">
    <div class="field">
    <label>Gender</label>
	<select name="gender" class="ui fluid dropdown">
	<?php 
	if($gender=="male")
	{
	echo "<option value='male' selected>Male</option>";
	echo "<option value='female'>Female</option>";
	}else{
	echo "<option value='male' >Male</option>";
	echo "<option value='female' selected>Female</option>";
	}	
	?>
	</select>
	</div>
    <div class="field">
    <label>Designation</label>
	<select name="designation"  class="ui fluid multiple search selection dropdown">
	
<?php
	include '\..\..\static\database.php';
	$sql = "SELECT DISTINCT designation FROM employee;";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
			if(strtolower($row['designation'])== strtolower($designation))
				echo "<option value='".strtolower($row['designation'])."' selected>".ucwords($row['designation'])."</option>";
				else
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
    <input type="number" name="contact" value="<?php echo $contact; ?>"  placeholder="Eg : 9495661468">
    </div>
    <div class="field">
    <label>Email Address</label>
    <input type="email" name="email"  value=<?php echo $email; ?> placeholder="Eg : someone@domain.com">
    </div>
    </div>
 
<div class="field">
<label>Specialisation</label>
<select name="specialisation"  class="ui fluid search dropdown">

<?php
	include '\..\..\static\database.php';
	$sql = "SELECT DISTINCT specialisation FROM employee;";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
			
			if(strtolower($row['specialisation'])== strtolower($specialisation))
echo "<option value='".strtolower($row['specialisation'])."' selected>".ucwords($row['specialisation'])."</option>";
				else
			echo "<option value='".strtolower($row['specialisation'])."'>".ucwords($row['specialisation'])."</option>";
		}		
	}
    mysqli_close($connection);
?>
</select>
</div>
  
	
    <div class="field">
    <label>Password</label>
    <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Change password">
  </div>
  

  <button class="ui primary button"  type="submit">Update detail</button>
  <button class="ui secondary button" type="button" onclick="cancel()">Cancel</button>
</form>

</div>

</body>
</html>