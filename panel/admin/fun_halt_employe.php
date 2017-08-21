 <?php
 	include '../../static/database.php';
	
	$eid=$_GET['emp_id'];
		
	$sql = "UPDATE employee SET status='halted' WHERE emp_id=$eid;";
    $result = mysqli_query($connection, $sql);
	echo "<script type='text/javascript'>window.location = 'dashbord.php?status=22'</script>";
    mysqli_close($connection);
?>