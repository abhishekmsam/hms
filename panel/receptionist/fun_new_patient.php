 <?php
 	include '../../static/database.php';
	
		$fname=$_GET['fname'];
		$mname=$_GET['mname'];
		$lname=$_GET['lname'];
		$address=$_GET['address'];
		$dob=$_GET['dob'];
		$gender=$_GET['gender'];
		$bloodgroup=$_GET['bloodgroup'];
		$religion=$_GET['religion'];
		$caste=$_GET['caste'];
		$martial_status=$_GET['martial_status'];
		$contact=$_GET['contact'];
		$email=$_GET['email'];
		
		if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
	}
		$timestamp=date('d/m/y').' '.date('h:i:sa');
		
	$sql = 
	"INSERT INTO patient VALUES(null,'".$fname."','".$mname."','".$lname."','".$address."','".$dob."','".$bloodgroup."','".$gender."','".$religion."','".$caste."','".$martial_status."','".$contact."','".$email."','".$timestamp."');";
    $result = mysqli_query($connection, $sql);
	echo "<script type='text/javascript'>window.location = 'dashbord.php?status=20'</script>";
    mysqli_close($connection);
?>