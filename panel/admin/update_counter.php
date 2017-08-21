<?php
	$total;
	$halted;
	
	include '/../../static/database.php';
	$sql = "SELECT COUNT(emp_id) FROM employee WHERE designation='receptionist';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		$row =mysqli_fetch_assoc($result);
		$total=$row['COUNT(emp_id)'];
	}
	
	$sql = "SELECT COUNT(emp_id) FROM employee WHERE designation='receptionist' AND status='halted';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		$row =mysqli_fetch_assoc($result);
		$halted=$row['COUNT(emp_id)'];
	}
	
    mysqli_close($connection);
	
	if($total==$halted)
	{
		echo "E";
	}
	else
	{
		echo "NE";
	}
	
?>