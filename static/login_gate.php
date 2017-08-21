<?php
	session_start();
	session_unset(); 
	session_destroy();
	include 'database.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql = "SELECT * FROM employee WHERE email='".$username."' AND password='".$password."';";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
			if($row["status"]=="halted")
			{
				echo "<script type='text/javascript'>window.location = '/hms/login.php?status=41'</script>";
			}
			else if($row["status"]=="inactive")
			{
				echo "<script type='text/javascript'>window.location = '/hms/login.php?status=42'</script>";
			}
			else if($row["designation"]=="receptionist")
			{
				//Setup session
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				echo "<script type='text/javascript'>window.location = '/hms/panel/receptionist/dashbord.php'</script>";
			}
			else if($row["designation"]=="doctor")
			{
				//Setup session
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				echo "<script type='text/javascript'>window.location = '/hms/panel/doctor/dashbord.php'</script>";
			}
			else if($row["designation"]=="pharmasist")
			{
				//Setup session
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				echo "<script type='text/javascript'>window.location = '/hms/panel/pharmasist/dashbord.php'</script>";
			}
			else if($row["designation"]=="admin")
			{
				//Setup session
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				echo "<script type='text/javascript'>window.location = '/hms/panel/admin/dashbord.php'</script>";
			}
			else
			{
				echo "<script type='text/javascript'>window.location = '/hms/login.php?status=45'</script>";
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>window.location = '/hms/login.php?status=40'</script>";
	}
    mysqli_close($connection);
?>

