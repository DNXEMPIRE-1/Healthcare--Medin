<!DOCTYPE html>
<?php 
include('session_hs.php'); ?>
<html>
<head>
	<title>Healthcare</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Welcome</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upload<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li role="separator" class="divider"></li>
                 <li><a href="test_upload_hs.php">Test details</a></li>
	            </ul>
	        </li>
	      </ul>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="view_patient_hs.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Patient Info <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          	<li><a href="#">View Patient</a></li>
	            <li role="separator" class="divider"></li>
	             <li><a href="Patient_reg.html">Patient registration</button></form</li>
	            </ul>
                </li>
	      </ul>
          </div>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Log Out</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav><!-- 
	<a href="./doctor_reg.html">Sign up</a>
	<a href="./doctor_login.html">Log in</a>

	<a href="./patient_reg.html">Sign up</a>
	<a href="./patient_login.html">Log in</a> --
</body>
</html>