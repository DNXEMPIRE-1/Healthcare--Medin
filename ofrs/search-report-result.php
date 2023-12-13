<?php include_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OFMS | Reporting</title>
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

                 <?php
$searchdata=$_POST['serachdata'];

?>           
                            <h2 class="card-title">Search Result Againt '<?php echo $searchdata;?>'</h2>


        
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                            <th>Sno.</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Location </th>
                                             <th>Message</th>
                                             <th>Reporting Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                      <tfoot>
                                         <tr>
                                            <th>Sno.</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Location </th>
                                             <th>Message</th>
                                             <th>Reporting Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select * from tblfirereport where   fullName like '%$searchdata%' || mobileNumber like '%$searchdata%' || location like '%$searchdata%'");
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
            
                         
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['fullName'];?></td>
                                            <td><?php echo $row['mobileNumber'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><?php echo $row['messgae'];?></td>
                                            <td><?php echo $row['postingDate'];?></td>
                                            <td>

                                <a href="details.php?requestid=<?php echo $row['id'];?>" class="btn-sm btn-primary">View</a> 

                              </td>
                                        </tr>
                               <?php $cnt++;
                           } ?>
                                    </tbody>
                                </table>
                      
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
