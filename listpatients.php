<?php
include_once "header.php";
?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php
            include_once "sidebar.php";
            include_once "nav.php";
        ?>

  <head>

  </head>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>List of Patients</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                    <div class="clearfix">
                      
                    </div>
                  </div>

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <a href="reportpatient.php" ><button type="button"  class="btn btn-primary btn-xs">Print report </button>
                    <table id="datatable-buttons" class="table table-striped" style="border-radius: 10px; width:100%">
                    <?php
                    require_once ('mysql_connect.php'); // Connect to the db.		
             	     $query = "SELECT * from patient";		
             	     $result = mysqli_query ($dbc, $query); // Run the query.
             	     $num = mysqli_num_rows($result);
             	     
             	     if ($num > 0) { // If it ran OK, display the records.
      
                 	// Table header.
                 	                 	echo '                      <thead>
                                      <tr>
                                        <th width="20"> ID </th>
                                        <th width="200">Name</th>
                                        <th width="100"> Mykid </th>
                                        <th width="100"> Manage Appointment </th>
                                       
                                       
                                      </tr>
                                    </thead>';

                 	                 	while ($row = mysqli_fetch_assoc($result)) {
                                        echo 
                                        
                                        '
                                      <tr>
                                      <td>' . $row['id_patient'] . '</td>
                                      <td>' . $row['fullname'] . '</td>
                                      <td>' . $row['mykid'] . '</td>
                                      
                                      <td> <a href="listreports.php?mykid=' . $row['mykid'] . '"<button type="button" style="size:5px;"class="btn btn-success btn-sm"> Manage Appointment </a></td>
                                     
                                    </tr>                                       
                 	                 		';
                 	      
                 	             	     	}
                 	             	     
                 	             	     	echo '</table>';
             	     	
             	     	mysqli_free_result ($result); // Free up the resources.	
             	     }
             	     	
             	     	mysqli_close($dbc); // Close the database connection.
             	     	
             	     	?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->


      <!-- jQuery -->
      <script src="../vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- FastClick -->
      <script src="../vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="../vendors/nprogress/nprogress.js"></script>
      <!-- iCheck -->
      <script src="../vendors/iCheck/icheck.min.js"></script>
      <!-- Datatables -->
      <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
      <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <!-- <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script> -->
      <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
      <!-- <script src="../vendors/jszip/dist/jszip.min.js"></script> -->
      <!-- <script src="../vendors/pdfmake/build/pdfmake.min.js"></script> -->
      <!-- <script src="../vendors/pdfmake/build/vfs_fonts.js"></script> -->

      <!-- Custom Theme Scripts -->
      <script src="../build/js/custom.min.js"></script>


  </body>
</html>