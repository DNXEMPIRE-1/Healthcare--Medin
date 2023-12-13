<!DOCTYPE html>
<?php 
include('session_hs.php'); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Healthcare</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
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
	</nav>
	<?php
		if(isset($_POST['patient_id'])){
		include("config.php");
		
		$pid = $_POST['pd'];
		$pres_id = $_POST['presid'];
		$did = $_POST['did'];
		$name = $_POST['name'];
		$result = $_POST['result'];
		$report = $_POST['report'];
		
		
		$q1 = "INSERT INTO test (p_id, d_id, pres_id, test_name, test_report, test_result)
				VALUES ('$pid','$did','$pres_id','$name','$report', '$result')";
				
		 $a = mysqli_query($conn,$q1);
		if(!$a){
			die(mysqli_error($conn));
		}
		
		echo "Test Uploaded!";
		
		mysqli_close($conn);
		
	}else{ ?>
	<div class="vertical-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 well">
					
					<h1 class="text-center">Test details</h1>
		
					<form action="#" method = "POST">
                      <div class="form-group">
                            <label>Patient's ID </label>
                            <div class="input-group">
                                <span class="input-group-addon">
									<i class="glyphicon "> </i>
								</span>
                                <input type="text" name="pid" class="form-control" required>
                            </div>
                        </div>
						
					    <div class="form-group">
							<label>Prescription ID</label>
							<div class="input-group">
								<span class="input-group-addon">
								</span>
								<input type="text" name="presid" class="form-control" required>	
							</div>						
						</div>
                         
				 		<div class="form-group">
							<label>Doctor ID</label>
							<div class="input-group">
								<span class="input-group-addon">
								</span>
								<input type="text" name="did" class="form-control" required>	
							</div>						
						</div>
                
						<div class="form-group">
							<label>Test name</label>
							<div class="input-group">
								<span class="input-group-addon">
								</span>
								<input type="text" name="name" class="form-control" required>	
							</div>						
						</div>


						<div class="form-group">
							<label>Test result</label>
							<div class="input-group">
								<span class="input-group-addon">
								</span>
								<input type="text" name="result" class="form-control" required>	
							</div>						
						</div>

						<div class="form-group">
							<label>Test report</label>
							<div class="input-group">
								<span class="input-group-addon">
								</span>
								<input type="text" name="report" class="form-control" required>	
							</div>						
						</div>
       
                        	<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-primary btn-block">	
						</div>
					</form>			
				</div>
			</div>
            </div>
	</div>
		<?php } ?>
</body>
</html>