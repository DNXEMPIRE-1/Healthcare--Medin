<!DOCTYPE html>
<?php 
include('session_doctor.php'); ?>
<html>
<head>
	<title>Healthcare</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
	
		<nav class="navbar navbar-default" style="height:15px">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.html">Healthcare</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upload <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="prescription.php">Prescription</a></li>
	            <li role="separator" class="divider"></li>
							<li><a href="test_upload.php">Test Request</a></li>	
	            <li><a href="test_upload.php">Test Results</a></li>
	            </ul>
	        </li>
	      </ul>
		
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Patient Info <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          	<li><a href="view_patient.php">View Patient</a></li>
	             <li><a href="patient_reg.html">Register Patient</a></li>                          
	            </ul>
                </li>
	      </ul>
        </div>
					
					<p style = "text-align: center;font-size:20px"> <b> Dr. <?php echo $_SESSION['user_name']; ?> </b></p> 

       <div>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-top:-80px">Settings <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="logout.php">Log Out</a></li>
	          </ul>
	        </li>
	      </ul>
	    <!--</div> /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<!-- 
	<a href="./doctor_reg.html">Sign up</a>
	<a href="./doctor_login.html">Log in</a>

	<a href="./patient_reg.html">Sign up</a>
	<a href="./patient_login.html">Log in</a> -->
</body>
</html>