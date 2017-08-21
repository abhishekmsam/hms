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
		
		function manageEmployee()
		{
			var emp_id=document.getElementById("temp").value;
			var mode=document.getElementById("temp2").value;
			if(mode=='halt')
			{
				window.location = "fun_halt_employe.php?emp_id="+emp_id;
			}
			else if(mode=='unhalt')
			{
				window.location = "fun_unhalt_employe.php?emp_id="+emp_id;
			}
			else if(mode=='delete')
			{
				window.location = "fun_delete_employe.php?emp_id="+emp_id;
			}
		}
		
		function searchEmployes()
		{
			var key=document.getElementById("searchbox").value;
			$('#employee_list').load('manage_list_employee.php?search='+key);
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

<div class="ui basic modal" id="deleteModel">
  <div class="ui icon header">
    <i class="minus circle icon"></i>
    Confirm <font color=red>DELETING</font> this account?
  </div>
  <div class="content">
    <p>Once this account got deleted, You can't recover it without further administration procedures</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button" >
      Don't delete
    </div>
    <div class="ui green ok inverted button" onClick="manageEmployee();">
      Delete now
    </div>
  </div>
</div>

<div class="ui basic modal" id="haltModel">
  <div class="ui icon header">
    <i class="minus circle icon"></i>
    Confirm <font color=red>HALTING or UNHALTING</font> this account?
  </div>
  <div class="content">
    <p>All activities from this acount will be suspended till halting is active</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button" >
      Cancel
    </div>
    <div class="ui green ok inverted button" onClick="manageEmployee();">
      Perform
    </div>
  </div>
</div>

	<!-- halt and delete script  @sangeeth -->
	<script>
	function edit(id)
	{
		$('#deleteModel').modal('setting', 'closable', false).modal('show');
		document.getElementById("temp").value=id;
		document.getElementById("temp2").value='delete';
	}
	function halt(id)
	{
		$('#haltModel').modal('setting', 'closable', false).modal('show');
		document.getElementById("temp").value=id;
		document.getElementById("temp2").value='halt';	
	}
	function unhalt(id)
	{
		$('#haltModel').modal('setting', 'closable', false).modal('show');
		document.getElementById("temp").value=id;
		document.getElementById("temp2").value='unhalt';
	}
	</script>
	
	<div id="temp"></div>
	<div id="temp2"></div>

	<!-- Inline search probe  @sangeeth -->

<script>
		$(document).ready(function()
		{
			searchEmployes();
		});
</script>

<div class="ui blue segment">

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

<div class="ui inverted blue segment">
  <p><b>MANAGE EMPLOYEE : Search an employe and click on 'Halt' or 'Delete' to manage the profile</b></p>
</div>

<div class="ui middle aligned divided list" id="employee_list">

</div>

</div>


</body>
</html>