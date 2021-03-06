<?php
require "global.php";
if(!isset($_SESSION['is_logged_in']) ||  $_SESSION['is_logged_in'] != "loggedin" ){
	header("Location:index.php");
}

if (!file_exists($setting_file_path)) {
    echo "The file $filename does not exist, failure and exiting....";
        exit(1);
}

$lines = file($setting_file_path, FILE_IGNORE_NEW_LINES);

$host = $lines[0];
$mode = $lines[1];
$status = $lines[2];
$th0ip = $lines[3];
$th1ip = $lines[4];
$th0mstr = $lines[5];
$th0rem = $lines[6];
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>RACWorc Home Example</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->
	<!--fonts-->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--//fonts-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- jQuery library -->
	<script src="js/jquery.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.js"></script>
	<style type="text/css">
		.content{
			padding: 30px 50px;
		}

		.top-menu{
			display: flex;
			justify-content: space-between;
		}

		.top-menu-item, .top-menu-item a{
			color: #b90b0b;
		    font-size: 30px;
		    font-weight: 600;
		}

		.xiota-content{
			width: 500px;
		    max-width: 500px;
		    margin: 50px auto;
		    background: #f2f2f2;
		    padding: 10px;
		    box-shadow: 3px 3px 20px 3px #585858;
		    text-align: left;
		}

		.xiota-content .nav a{
			color: #000;
    		font-size: 20px;
    		border-radius: 0;
    		margin-right: 0;
		}

		.xiota-content .nav .active{
		    
			border: 1px solid #000;
			border-bottom:0;
		}

		.xiota-content .nav .active a,
		.xiota-content .nav .active a:hover,
		.xiota-content .nav .active a:focus{
			background-color: #f2f2f2;
		}

		.xiota-content .nav-tabs {
		    border-bottom: 1px solid #000;
		}

		#menu-settings{

		}

		#menu-settings input{
			width: 100%;
		}

		#menu-settings .row{
			margin-top: 10px;
		}

		.save-btn{
			background: #dc2424;
		    margin: 10px;
		    text-align: center;
		    color: white;
		    padding: 5px 10px;
		    font-size: 18px;
		    border-radius: 2px;
		    border: 0;
		}
	</style>
</head>

<body>
	<div id="content">
		<img src="images/racworc.png" class="content"/>
	</div>

	<div class="content">
		
		<div class="top-menu">
			<div class="top-menu-item">Home</div>
			<div class="top-menu-item">
				<a href="/logout.php">Logout</a>
			</div>	
		</div>
		<div style="color: #000;font-size: 13px;font-weight: 600;text-align: left;">User Name : <?=$_SESSION['username']?></div>
		
		<div class="xiota-content">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#menu-settings">Settings</a></li>
			  <li><a data-toggle="tab" href="#menu-alerts">Alerts</a></li>
			  
			</ul>

			<form name="myform" method="POST" action="savesetting.php">

			<div class="tab-content">
			  <div id="menu-settings" class="tab-pane fade in active">
			   <div class="row">
			   	<div class="col-md-3 ">Hostname:</div>
			   	<div class="col-md-9"><input value="<?=$host?>" name="host"></div>
			   </div>

			   <div class="row">
			   	<div class="col-md-3">Mode:</div>
			   	<div class="col-md-9"><input value="<?=$mode?>" name="mode"></div>
			   </div>

			   <div class="row">
			   	<div class="col-md-3">Status:</div>
			   	<div class="col-md-9"><input value="<?=$status?>" name="status"></div>
			   </div>

			   <hr style="border: solid 1px #545050;">

			   <div class="row">
			   	<div class="col-md-3">Eth0 IP:</div>
			   	<div class="col-md-3"><input value="<?=$th0ip?>" name="th0ip"></div>
			   	<div class="col-md-3">Eth1 IP:</div>
			   	<div class="col-md-3"><input value="<?=$th1ip?>" name="th1ip"></div>
			   </div>

			   <div class="row">
			   	<div class="col-md-3">Eth0 Mstr:</div>
			   	<div class="col-md-3"><input value="<?=$th0mstr?>" name="th0mstr"></div>
			   	<div class="col-md-3">Eth0 Rem:</div>
			   	<div class="col-md-3"><input value="<?=$th0rem?>" name="th0rem"></div>
			   </div>

			   <div class="row">
			   	<button type="submit" class="col-md-3 save-btn">
			   		Save
			   	</button>
			   </div>
			  </div>

			  <div id="menu-alerts" class="tab-pane fade">
			    <p>Some content in menu 1.</p>
			    <p>Some content in menu 2.</p>
			    <p>Some content in menu 3.</p>
			    <p>etc...</p>
			  </div>
			  
			</div>
			</form>
		</div>
	</div>
	<!-- <div class="xiota">
		<form action="#" method="post">
			<div class="xiota  w3l-sub">
				<input type="button" id="Button1" name="" value="Alerts" style="position:absolute;left:301px;top:120px;width:231px;height:45px;z-index:0;">
			</div>
			<div class="xiota  w3l-sub">
				<input type="button" value="Settings">
			</div>
		</form>
	</div> -->
	<!-- //form ends here -->
</body>

</html>