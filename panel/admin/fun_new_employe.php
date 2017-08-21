 <?php
 	include '../../static/database.php';
	
		$fname=$_GET['fname'];
		$lname=$_GET['lname'];
		$address=$_GET['address'];
		$dob=$_GET['dob'];
		$doj=$_GET['doj'];
		$gender=$_GET['gender'];
		$designation=$_GET['designation'];
		$contact=$_GET['contact'];
		$email=$_GET['email'];
		$specialisation=$_GET['specialisation'];
		$password=$_GET['password'];

echo "<script>alert($specialisation);</script>";
		
	$sql = 
	"INSERT INTO employee VALUES(null,'".$fname."','".$lname."','".$address."','".$dob."','".$gender."','".$designation."','".$doj."','".$contact."','".$email."','".$specialisation."','".$password."','active');";
    $result = mysqli_query($connection, $sql);
	echo "<script type='text/javascript'>window.location = 'dashbord.php?status=20'</script>";
    mysqli_close($connection);
?>