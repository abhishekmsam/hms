	<?php
	include '../../static/database.php';
	if(isset($_GET['search'])) 
	{
    	$sql = "SELECT * FROM employee WHERE fname LIKE '%".$_GET['search']."%' OR lname LIKE '%".$_GET['search']."%' ORDER BY fname;";
	}
	else
	{
		$sql = "SELECT * FROM employee ORDER BY fname;";
	}
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
		echo "
		<div class='item'>
		<div class='right floated content'>
		<div class='ui primary button' onClick='edit($row[emp_id])'>Update Info</div>
		</div>";
		if($row['gender']=="male")
		{
		echo "<img class='ui avatar image' src='/hms/drawable/sub_icon_male_employe.png'>";
		}
		else
		{
		echo "<img class='ui avatar image' src='/hms/drawable/sub_icon_female_employe.png'>";		
		}
		echo "<div class='content'>
		".$row['fname']." ".$row['lname']."
		</div>
		</div>";
		}
	}
    mysqli_close($connection);
	?>