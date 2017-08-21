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
		$('.tag.example .ui.dropdown').dropdown({allowAdditions: true});
	</script>
	<!-- script to show edit employee detail window  @jemshid -->
	<script>
	
	function edit(id)
	{
		$('#employe').load('edit_employee_form.php?id='+id);
	}
	
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

	<!-- Inline search probe  @sangeeth -->
	
<script>
function searchEmployes()
{
	var key=document.getElementById("searchbox").value;
	$('#employee_list').load('list_employee.php?search='+key);
}
</script>

<script>
		$(document).ready(function()
		{
			searchEmployes();
		});
</script>

<div class="ui orange segment">

<div class="ui form">
  <div class="inline fields">
    <label>Search For Employees</label>
    <div class="field">
      <input type="text" placeholder="Search criteria" id="searchbox">
    </div>
    <div class="six wide field">
      <div class='ui possitive button' onClick="searchEmployes();">Search</div>
    </div>
  </div>
</div>

<div class="ui inverted orange segment">
  <p><b>EDIT EMPLOYEE : Search an employe and click on 'Edit' to edit the profile</b></p>
</div>

<div class="ui middle aligned divided list" id="employee_list">

</div>

</div>


</body>
</html>