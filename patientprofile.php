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
              <h3>Patient's Schedule</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search">

              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">
            <?php
            require_once('mysql_connect.php'); // Connect to the db.		
            $mykid = $_GET['mykid'];
            $query = "SELECT * from patient where mykid='$mykid'";
            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Patient's Details </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="item form-group">
                    <label for="fullname" class="col-form-label col-md-3 col-sm-3 label-align"> Full Name </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="fullname" class="form-control" readonly="readonly" type="text" name="fullname" value="<?php echo $row["fullname"]; ?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="mykid" class="col-form-label col-md-3 col-sm-3 label-align"> Mykid </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="mykid" class="form-control" readonly="readonly" type="text" name="mykid" value="<?php echo $row["mykid"]; ?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="parents" class="col-form-label col-md-3 col-sm-3 label-align"> Mother's Name </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="parents" class="form-control" readonly="readonly" type="text" name="parents" value="<?php echo $row["parents"]; ?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="gender" class="col-form-label col-md-3 col-sm-3 label-align"> Gender </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="gender" class="form-control" readonly="readonly" type="text" name="gender" value="<?php echo $row["gender"]; ?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="address" class="col-form-label col-md-3 col-sm-3 label-align"> Address </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="address" class="form-control" readonly="readonly" type="text" name="address" value="<?php echo $row["address"]; ?>">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label for="phone" class="col-form-label col-md-3 col-sm-3 label-align"> Phone Number </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input id="phone" class="form-control" readonly="readonly" type="text" name="phone" value="<?php echo $row["phone"]; ?>">
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- end of patient's details -->


            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Patient's Schedule <small class="green"> Completed </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped" style="width:100%">
                          <?php
                          require_once('mysql_connect.php'); // Connect to the db.		
                          $mykid = $_GET['mykid'];
                          $query =  "SELECT * FROM appointment where mykid ='$mykid' AND appt_status='Completed'";
                          $result = mysqli_query($dbc, $query); // Run the query.
                          $num = mysqli_num_rows($result);
                          if ($num > 0) { // If it ran OK, display the records.
                            echo '                      
                                 <thead>
                                    <tr>
                                    <th width="200">Type of Vaccine </th>
                                    <th width="200">Date Completed</th>
                                    <th width="100">Status</th>
                                    <th>Doctor</th>        
                                    <th> Remark </th>                           
                                    </tr>
                                  </thead>';

                            while ($row = mysqli_fetch_assoc($result)) {
                              echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>
                                    <td>' . date_format(new DateTime($row['appt_end']), 'd/m/Y H:i:s') . '</td>
                                    <td>' . $row['appt_status'] . '</td>
                                    <td>' . $row['doc'] . '</td>    
                                    <td>' . $row['remark'] . '</td>                         
                                    </tr>                                       
                 	                 	';
                            }

                            echo '</table>';
                            mysqli_free_result($result); // Free up the resources.	
                          }
                          ?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- end of patient's complete -->

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Patient's Schedule <small class="blue"> Scheduled </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="card-box table-responsive">
                  <table id="datatable-buttons" class="table table-striped" style="width:100%">
                    <?php
                    require_once('mysql_connect.php');
                    $mykid = $_GET['mykid'];
                    $query =  "SELECT * FROM appointment where mykid='$mykid' AND appt_status='Scheduled'";

                    $result = mysqli_query($dbc, $query); // Run the query.
                    $num = mysqli_num_rows($result);

                    if ($num > 0) { // If it ran OK, display the records.

                      //Table header.
                      echo '                      
                                 <thead>
                                    <tr>
                                    <th>Type of Vaccine </th>
                                    <th width="80">Date </th>
                                    <th width="80">Time </th>
                                    <th width="80">Time End </th>                                    
                                    <th>Doctor</th>
                                   
                                    </tr>
                                  </thead>';

                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>
                                    <td>' . date_format(new DateTime($row['appt_start']), 'd/m/Y') . '</td>
                                    <td>' . date_format(new DateTime($row['appt_start']), 'G:ia') . '</td>
                                    <td>' . date_format(new DateTime($row['appt_end']), 'G:ia') . '</td>                                   
                                    <td>' . $row['doc_name'] . '</td>
                                    
                                    
                                       
                                    </tr>                                       
                 	                 	';
                      }

                      echo '</table>';

                      mysqli_free_result($result); // Free up the resources.	
                    }

                    // mysqli_close($dbc); // Close the database connection.

                    ?>
                  </table>
                </div>



              </div>
            </div>

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Patient's Schedule <small> Dismissed </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="card-box table-responsive">
                  <table id="datatable-buttons" class="table table-striped" style="width:100%">
                    <?php
                    require_once('mysql_connect.php');
                    $mykid = $_GET['mykid'];
                    $query =  "SELECT * FROM appointment where mykid='$mykid' AND appt_status='Dismissed'";

                    $result = mysqli_query($dbc, $query); // Run the query.
                    $num = mysqli_num_rows($result);

                    if ($num > 0) { // If it ran OK, display the records.

                      //Table header.
                      echo '                      
                                 <thead>
                                    <tr>
                                    <th>Type of Vaccine </th>
                                    <th>Remark</th>                                   
                                    </tr>
                                  </thead>';

                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>
                                    <td>' . $row['remark'] . '</td>    
                                    </tr>                                       
                 	                 	';
                      }

                      echo '</table>';

                      mysqli_free_result($result); // Free up the resources.	
                    }

                    // mysqli_close($dbc); // Close the database connection.

                    ?>
                  </table>
                </div>



              </div>
            </div>

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Patient's Schedule <small class="red"> Not scheduled/Not Complete (generated)</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>


                <!-- not complete schedule -->
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped" style="width:100%">
                      <?php
                      require_once('mysql_connect.php'); // Connect to the db.		
                      $mykid = $_GET['mykid'];
                      $query =  "SELECT * FROM appointment where mykid='$mykid' AND appt_status='Not complete'";

                      $result = mysqli_query($dbc, $query); // Run the query.
                      $num = mysqli_num_rows($result);

                      if ($num > 0) { // If it ran OK, display the records.

                        //Table header.
                        echo '                      
                                 <thead>
                                    <tr>
                                    <th>Type of Vaccine </th>
                                    <th width="200">Date Scheduled</th>
                                    <th> Manage </th>
                                    </tr>
                                  </thead>';

                        while ($row = mysqli_fetch_assoc($result)) {
                          $date_now = date("Y-m-d H:i:s");
                          $date_appt = date('Y-m-d H:i:s', strtotime($row['appt_start']));
                          $btndisplay = '<a href="manage.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-success btn-sm"> Manage </a>';
                          if ($date_appt < $date_now) {
                            $btndisplay = '<a href="manage.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-danger btn-sm"> Manage </a>';
                          } else {
                            $btndisplay = '<a href="manage.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-success btn-sm"> Manage </a>';
                          }
                          echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>
                                    <td>' . date_format(new DateTime($row['appt_start']), 'd/m/Y') . '</td>
                                    <td>' . $btndisplay . '</td>
                                    </tr>                                       
                 	                 	';
                        }

                        echo '</table>';

                        // Free up the resources.	
                      }

                      // mysqli_close($dbc); // Close the database connection.

                      ?>
                    </table>
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
      <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
      <script src="../vendors/jszip/dist/jszip.min.js"></script>
      <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
      <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

      <!-- Custom Theme Scripts -->
      <script src="../build/js/custom.min.js"></script>

</body>

</html>