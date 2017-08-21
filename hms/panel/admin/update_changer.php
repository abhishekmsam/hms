	<?php
	$status=$_GET['status'];
	include '\..\..\static\database.php';
	$sql = "UPDATE employee SET status='$status' WHERE designation='receptionist'";
    $result = mysqli_query($connection, $sql);
    mysqli_close($connection);
	?>