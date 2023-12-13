<?php session_start();
//DB conncetion
include_once('includes/config.php');
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//Code for assign request
    if(isset($_POST['submit']))
  {
    $rid=$_GET['requestid'];
    $assignto=$_POST['assignto'];
    $assigntime=date('d-m-y h:m:s');
$query=mysqli_query($con, "update tblfirereport set assignTo='$assignto',assignTme='$assigntime',status='Assigned' where id='$rid'");
if ($query) {
echo '<script>alert("Request has been assigned to the team.")</script>';
echo "<script>window.location.href ='assigned-requests.php'</script>";
  }else{
echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }
// Code for History
    if(isset($_POST['takeaction']))
  {
    $rid=$_GET['requestid'];
    $status=$_POST['status'];
    $remark=$_POST['remark'];
$query=mysqli_query($con, "insert into tblfiretequesthistory(requestId,status,remark) values('$rid','$status','$remark')");
if ($query) {
$query=mysqli_query($con, "update tblfirereport set status='$status' where id='$rid'");    
echo '<script>alert("Request has been updated.")</script>';
echo "<script>window.location.href ='all-requests.php'</script>";
  }else{
echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Fire Reporting Details</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
label{
    font-size:16px;
    font-weight:bold;
    color:#000;
}

</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php include_once('includes/sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
          <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Fire Reporting Details</h1>
     <form method="post"  name="adminprofile" >



  <div class="row">

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Personal Information (Reported by)</h6>
                                </div>
                                <div class="card-body">
   
<?php $rid=$_GET['requestid'];
$query=mysqli_query($con,"select * from tblfirereport where id='$rid'");
while($row=mysqli_fetch_array($query)){
?>
 <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Full Name</th> 
    <td><?php echo $row['fullName'];?></td>
    </tr>

     <tr>
    <th>Mobile Number</th> 
    <td><?php echo $row['mobileNumber'];?></td>
    </tr>

     <tr>
    <th>Location</th> 
    <td><?php echo $row['location'];?></td>
    </tr>


     <tr>
    <th>Message</th> 
    <td><?php echo $row['messgae'];?></td>
    </tr>


     <tr>
    <th>Reporting Time</th> 
    <td><?php echo $row['postingDate'];?></td>
    </tr>



    </tr>
 </table>
 <?php if($row['assignTo']==''): 
    ?>
        <div class="form-group">
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assignto">Assign To</button>
            </div>                                        
<?php else: 
$rstatus=$row['status'];
if($rstatus=='Assigned' || $rstatus=='Team On the Way' || $rstatus=='Fire Relief Work in Progress'):?>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#takeaction">Take Action</button>
<?php 
endif;
endif;?>
<?php } ?>
        
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Assigned Details</h6>
                                </div>
                                <div class="card-body">
<?php $query=mysqli_query($con,"select * from tblfirereport 
join tblteams on tblteams.id=tblfirereport.assignTo
    where tblfirereport.id='$rid'");
$count=mysqli_num_rows($query);
if($count>0){
while($row=mysqli_fetch_array($query)){ ?>


 <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Team Name</th> 
    <td><?php echo $row['teamName'];?></td>
    </tr>

    <tr>
    <th>Team Leader Name</th> 
    <td><?php echo $row['teamLeaderName'];?></td>
    </tr>


    <tr>
    <th>TL Mobile No.</th> 
    <td><?php echo $row['teamLeadMobno'];?></td>
    </tr>

 <tr>
    <th>Team Members</th> 
    <td><?php echo $row['teamMembers'];?></td>
    </tr>
     <tr>
    <th>Assigned Time</th> 
    <td><?php echo $row['assignTme'];?></td>
    </tr>

</table>
<?php } }  else {?>
<h4  style="color:red;" align="center">Not Assigned Yet</h4>
<?php } ?>       

  
                                </div>
                            </div>

                        </div>
                    </div>

<!-- Test Tracking History --->
<?php
$ret=mysqli_query($con,"select * from tblfiretequesthistory where requestId='$rid'");
$num=mysqli_num_rows($ret);
?>

<div class="row">
                         <div class="col-lg-12">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" align="center">Request  Track History</h6>
                                </div>
                                <div class="card-body">
<?php if($num>0){
?>
 <table class="table table-bordered"  width="100%" cellspacing="0">
<tr>
    <th>Remark</th>
    <th>Status</th>
    <th>Remark Date</th>
<?php while($result=mysqli_fetch_array($ret)){?>
</tr>
    <tr>
    <td><?php echo $result['remark'];?></td> 
    <td><?php echo $result['status'];?></td>
    <td><?php echo $result['postingDate'];?></td>
    </tr>

<?php } // End while loop?>

</table>
         <?php
       //end if   
     } else { ?>    
<h4 align="center" style="color:red"> No Tracking history found </h4>
         <?php } ?>           


                                </div>
                            </div>

                        </div>
                    </div>




</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

           <?php include_once('includes/footer2.php');?>

<!-- Assign Modal -->
<div id="assignto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Assign to</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
<form method="post">
          <p>  <select class="form-control" name="assignto" required="true">
            <option value="">Select Team</option>
            <?php $sql=mysqli_query($con,"select id,teamName,teamLeaderName from tblteams");
            while ($result=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo $result['id'];?>"><?php echo $result['teamName'];?>-(<?php echo $result['teamLeaderName'];?>)</option>
        <?php } ?>
            </select></p>
            <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>

<!-- Take Action Modal -->
<div id="takeaction" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Take Action</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data" >
          <p>  <select class="form-control" name="status" id="status" required="true">
            <option value="">Select Action</option>
  <?php 

  $query1=mysqli_query($con,"select status from tblfirereport where id='$rid'");
  while($result=mysqli_fetch_array($query1)):
$rstatus=$result['status'];
endwhile;
  ?>

            <?php if($rstatus=='Assigned'):?>
            <option value="Team On the Way">Team On the Way</option>
            <option value="Fire Relief Work in Progress">Fire Relief Work in Progress</option>
            <option value="Request Completed">Request Completed</option>
            <?php elseif($rstatus=='Team On the Way'):?>
        <option value="Fire Relief Work in Progress">Fire Relief Work in Progress</option>
            <option value="Request Completed">Request Completed</option>
            <?php elseif($rstatus=='Fire Relief Work in Progress'):?>
               <option value="Request Completed">Request Completed</option>
         <?php endif;?>

            </select>

       <p>
<textarea name="remark" class="form-control" required="true" placeholder="Remark (Max 500 Characters)" maxlength="500" rows="5"></textarea>  </p> 
  <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="takeaction" id="submit">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </form>
    </div>

  </div>
</div>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
<?php } ?>