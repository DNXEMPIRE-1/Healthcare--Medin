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
                            <h2 class="card-title">Online Fire Report</h2>

<form method="post" action="search-report-result.php">
  <table class="table table-bordered">

    <tbody>
      <tr>
        <th>Search By Reported by Name/ Mobile No / Location</th>
        <td width="550"> <input type="text" class="form-control" id="serachdata" name="serachdata" required="true" placeholder="Enter Reported by Name/ Mobile No / Location"></td>
      </tr>
 

          <tr>
              <td></td>
              <td><input type="submit" name="submit" class="btn btn-primary"></td>
          </tr>

    </tbody>
  </table>
</form>                        
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
