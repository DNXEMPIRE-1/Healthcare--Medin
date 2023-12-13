<?php include_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OFMS | Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
<?php include_once('includes/header.php') ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->

            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-12 mb-5">
                    <div class="card h-100">
                        <div class="card-body">



     
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

                      
</div>
                    </div>
                </div>
       
            </div>
        </div>
        <!-- Footer-->
<?php include_once('includes/footer.php') ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
