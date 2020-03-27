<?php
session_start();
include("conn.php");

if(isset($_POST['submit'])){
	$event_name = $_POST['event_name'];
	$type = $_POST['type'];

	$_SESSION['event_name'] = $event_name;
	$_SESSION['type'] = $type;
	
	header('Location: generate_certificate.php');
	exit();
}
?>
<!DOCTYPE html>
<html  class="mdl-js" hc="b0" hcx="0">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<title>Certificate Generation System</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />

	<link rel="stylesheet" href="css/getmdl-select.min.css">
	<script defer src="js/getmdl-select.min.js"></script>

</head>
<body style="min-height: fit-content;">

<div class="login" style="margin:10% auto 0;">

	<div class="demo-card-wide mdl-card mdl-shadow--2dp firebaseui-container" style="color:#000;  font:inherit; font-size:19px;">
		<form method="post" action="certificate_home.php">
			<div class="firebaseui-card-header">
				<h1 class="firebaseui-title" style="text-align: center;">Certificate Generation System</h1>
				<br>
			</div>
			<div class="firebaseui-card-content">

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
			        <input type="text" value="" class="mdl-textfield__input" id="event_name" readonly>
			        <input type="hidden" value="" name="event_name">
			        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
			        <label for="event_name" class="mdl-textfield__label">Event Name</label>
			        <ul for="event_name" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
			        	<?php
		            		$sql = "SELECT event_name FROM events";
		            		$res = mysqli_query($conn,$sql);
		            		while($row = mysqli_fetch_array($res)){
		            			echo '<li class="mdl-menu__item" data-val="'.$row['event_name'].'">'.$row['event_name'].'</li>';
		            		}
		            	?>
			        </ul>
			    </div>
				
  				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
			        <input type="text" value="" class="mdl-textfield__input" id="type" readonly>
			        <input type="hidden" value="" name="type">
			        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
			        <label for="type" class="mdl-textfield__label">Type</label>
			        <ul for="type" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
			        	<li class="mdl-menu__item" data-val="MERIT">Merit</li>
			        	<li class="mdl-menu__item" data-val="PARTICIPATION">Participation</li>			        	
			        </ul>
			    </div>	  				
			</div>
			<div class="firebaseui-card-actions">
				<div class="firebaseui-form-actions">				
					<button name="submit" type="submit" class="firebaseui-id-submit firebaseui-button mdl-button mdl-js-button mdl-button--raised mdl-button--colored" data-upgraded=",MaterialButton">Go</button>
				</div>
			</div>
		</form>
	</div>

</div>
</body>
</html>