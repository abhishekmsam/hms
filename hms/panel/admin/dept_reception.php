<?php 
		session_start();
		if (!isset($_SESSION['username'])) 
		{
			echo "<script type='text/javascript'>window.location = '/hms/login.php?status=44'</script>";
		}
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
	<script>
		$('.ui.dropdown').dropdown();
		$('.tag.example .ui.dropdown').dropdown({
			allowAdditions: true
		});
	</script>
	<style>
	.boxmargin
	{
		margin: 3% 3% 3% 3%;
	}
	.topmargin
	{
		margin: 1% 0% 0% 0%;
	}
	body
	{
		background:
		radial-gradient(black 15%, transparent 16%) 0 0,
		radial-gradient(black 15%, transparent 16%) 8px 8px,
		radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 0 1px,
		radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 8px 9px;
		background-color:#282828;
		background-size:16px 16px;
	}
	</style>
</head>

<body>
	<div class="ui toggle checkbox" id="main" >
	<input type="checkbox" name="public" id="disableall"  onChange="disable();"  >
	<label>Disable this department</label>
	</div>
	
	<script>
function disable()
{
	if (document.getElementById('disableall').checked)
		{
            $.post("update_changer.php?status=halted",function(status,data){});
        } 
		else 
		{
           $.post("update_changer.php?status=active",function(status,data){});
        }
}

$('.ui.toggle.checkbox')
  .checkbox()
  .first().checkbox({
    onChange: function() {
    }
  })
;


	</script>
	
	<script>
		$(document).ready(function()
		{
			$.post("update_counter.php",function(data,status){
				if(data=='E')
				{
					document.getElementById('disableall').checked=true;
				}
				else
				{
					document.getElementById('disableall').checked=false;
				}
			});
		});
	</script>
	
	<div class="ui middle aligned divided list">
	<?php
	include '../../static/database.php';
	$sql = "SELECT * FROM employee WHERE designation='receptionist' ORDER BY fname;";
    $result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) 
	{
		while($row =mysqli_fetch_assoc($result))
		{
		echo "
		<div class='item'>
		<div class='right floated content'>
			<div class='ui possitive button'>Edit</div>
		</div>";
		
		if($row['status']=="halted")
		{
		echo "<script>document.getElementById(".$row['emp_id'].").checked=true;</script>";
		}
		else
		{
			echo "<script>document.getElementById(".$row['emp_id'].").checked=false;</script>";
		}
	
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

</div>

	
</body>

</html>