<?php 
		session_start();
		if (!isset($_SESSION['username'])) 
		{
			echo "<script type='text/javascript'>window.location = '/hms/login.php?status=44'</script>";
		}
		echo 
		"[ { &quot;title&quot;: &quot;Sangeeth&quot;, &quot;description&quot;: &quot;An Animal&quot;}, { &quot;title&quot;: &quot;Sonu&quot;, &quot;description&quot;: &quot;Another Animal&quot;} ]";
?>