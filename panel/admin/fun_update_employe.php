 <?php
 	include '/../../static/database.php';
	session_start();
	 $id=$_SESSION['id'];
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

	$sql = 
	"UPDATE employee SET fname='$fname',lname='$lname',address='$address',dob='$dob',doj='doj',gender='$gender',designation='$designation',contact='$contact',email='$email',specialisation='$specialisation',password='$password' WHERE emp_id=$id;";
    $result = mysqli_query($connection, $sql);
	echo "<script type='text/javascript'>window.location = 'dashbord.php?status=20'</script>";
	
    mysqli_close($connection);
?>