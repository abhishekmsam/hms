<?php
	session_start();
	session_unset(); 
	session_destroy();
	echo "<script type='text/javascript'>window.location = '/hms/login.php?status=43'</script>";
?>