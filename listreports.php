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
        <style>
          .tile-stats h4 {
            color: #BAB8B8;
          }
        </style>
      </head>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Patient Profile</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search">
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Patient Activity Report</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <?php
                  require_once('mysql_connect.php'); // Connect to the db.		
                  $mykid = $_GET['mykid'];
                  $query = "SELECT * from patient where mykid='$mykid'";
                  $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                  $row = mysqli_fetch_assoc($result);
                  ?>
                  <!-- User details -->
                  <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="images/icon.png" style="width:180px" alt="Avatar" title="Change the avatar">
                      </div>
                    </div><br>
                    <h4><?= $row['fullname'] ?></h4>
                    <?php                  
                    ?>                                   
                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-credit-card user-profile-icon"></i> <?= $row['mykid'] ?>
                      </li>
                      <i class="fa fa-female user-profile-icon"></i> <?= $row['gender'] ?>
                      </li>
                      <li class="m-top-xs">
                        <i class="fa fa-phone user-profile-icon"></i> <?= $row['phone'] ?>
                      </li>
                      <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $row['address'] ?>
                      </li>
                      <li>
                    </ul>

                    <a href="patientprofile.php?mykid=<?= $_GET['mykid'] ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> View Schedule</a>
                    <a href="reportonepatient.php?mykid=<?= $_GET['mykid'] ?>" class="btn btn-warning"><i class="fa fa-edit m-right-xs"></i> Patient's Report</a>
                    <br />
                  </div>
                  <!-- end user details  -->
                  <div class="col-md-9 col-sm-9 ">
                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>User Activity Report</h2>
                      </div>

                    </div>
                    <div>
                      <?php
                      require_once('mysql_connect.php'); // Connect to the db.		
                      $mykid = $_GET['mykid'];
                      $d = date("m");

                      $query = "SELECT * from appointment where mykid='$mykid' and appt_status='Scheduled' and appt_start =DATE_FORMAT($d,'%c')";
                      $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                      while ($row = mysqli_fetch_array($result)) { ?>
                        <ul class="list-unstyled msg_list">
                          <li style="background-color: #fff;">
                            <a>
                              <span style="font-weight: bold;">
                                <?= $row['appt_type'] ?>
                              </span><br>
                              </span>
                              <span class="time">
                                <?= $row['appt_status'] ?>
                              </span>
                              <span class="message">
                                <?= date_format(new DateTime($row['appt_start']), 'G:i:a') ?> - <?= date_format(new DateTime($row['appt_end']), 'G:i:a') ?>
                              </span>
                            </a>
                          </li>
                        <?php  } ?>
                        </ul>
                    </div>


                    <div class="">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav justify-content-end bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tabcontent" id="first-page" role="tab" data-toggle="tab" aria-expanded="true">Progress Status</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content1" id="tab" role="tab" data-toggle="tab" aria-expanded="false">Scheduled</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Not Complete</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Completed</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Dismissed</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="tabcontent" aria-labelledby="first-page">

                            <table class="data table table-striped no-margin">
                              <?php
                              require_once('mysql_connect.php');
                              $mykid = $_GET['mykid'];
                              $q1 =  "SELECT * FROM appointment where mykid='$mykid' and vtype='bcg'";

                              $r1 = mysqli_query($dbc, $q1); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>
                                    
                                <th> Bacillus Calmette-Guerin (BCG) </th>                                                        
                                <th width="200px">Status</th>                              
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {                                 
                                  
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qhepb =  "SELECT * FROM appointment where mykid='$mykid' and vtype='hepB'";
                              $r1 = mysqli_query($dbc, $qhepb); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Hepatitis B</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qdtap =  "SELECT * FROM appointment where mykid='$mykid' and vtype='dtap'";
                              $r1 = mysqli_query($dbc, $qdtap); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Diptheria, Tetanus, accellular Pertussis (DTaP)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qhib =  "SELECT * FROM appointment where mykid='$mykid' and vtype='hib'";
                              $r1 = mysqli_query($dbc, $qhib); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Haemophilus influenzae b</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qipv =  "SELECT * FROM appointment where mykid='$mykid' and vtype='ipv'";
                              $r1 = mysqli_query($dbc, $qipv); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Inactivated Poliovirus (IPV)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qm =  "SELECT * FROM appointment where mykid='$mykid' and vtype='measles'";
                              $r1 = mysqli_query($dbc, $qm); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Measles (Sabah only)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qje =  "SELECT * FROM appointment where mykid='$mykid' and vtype='je'";
                              $r1 = mysqli_query($dbc, $qje); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Japanese Encephalitis (JE) (Sarawak only) </th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }

                              $qdt =  "SELECT * FROM appointment where mykid='$mykid' and vtype='dt'";
                              $r1 = mysqli_query($dbc, $qdt); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Diptheria, Tetanus (DT booster)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }
                              $qmmr =  "SELECT * FROM appointment where mykid='$mykid' and vtype='mmr'";
                              $r1 = mysqli_query($dbc, $qmmr); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Mumps, Measles, Rubella (MMR)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }
                              $qhpv =  "SELECT * FROM appointment where mykid='$mykid' and vtype='hpv'";
                              $r1 = mysqli_query($dbc, $qhpv); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }
                              $qtt =  "SELECT * FROM appointment where mykid='$mykid' and vtype='tt'";
                              $r1 = mysqli_query($dbc, $qtt); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>                              
                                <th>Tetanus (TT)</th>                                                                 
                                <th width="200px">Status</th>                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['appt_status'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }
                              ?>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane" id="tab_content1" aria-labelledby="tab">

                            <table class="data table table-striped no-margin">
                              <?php
                              require_once('mysql_connect.php');
                              $mykid = $_GET['mykid'];
                              $q1 =  "SELECT * FROM appointment where mykid='$mykid' AND appt_status='Scheduled'";

                              $r1 = mysqli_query($dbc, $q1); // Run the query.
                              $num1 = mysqli_num_rows($r1);

                              if ($num1 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>
                                <tr>
                                <th>Type of Vaccine </th>
                                <th width="80">Date </th>
                                <th width="80">Time </th>
                                <th width="80">Time End </th>                                    
                                <th>Doctor</th>
                                <th> Edit </th>
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r1)) {
                                  $date_now = date("Y-m-d H:i:s");
                                  $date_appt = date('Y-m-d H:i:s', strtotime($row['appt_start']));
                                  $btndisplay = '<a href="editappt.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-success btn-sm"> Reschedule </a>';
                                  if ($date_appt < $date_now) {
                                    $btndisplay = '<a href="editappt.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-danger btn-sm"> Urgent Reschedule </a>';
                                  } else {
                                    $btndisplay = '<a href="editappt.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-success btn-sm"> Reschedule </a>';
                                  }
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>
                                    <td>' . date_format(new DateTime($row['appt_start']), 'd/m/Y') . '</td>
                                    <td>' . date_format(new DateTime($row['appt_start']), 'G:ia') . '</td>
                                    <td>' . date_format(new DateTime($row['appt_end']), 'G:ia') . '</td>                                   
                                    <td>' . $row['doc'] . '</td>
                                    <td>' . $btndisplay . ' </td>   
                                    </tr>                                       
                 	                 	';
                                }
                              }
                              ?>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">

                              <?php
                              require_once('mysql_connect.php');
                              $mykid = $_GET['mykid'];
                              $q2 =  "SELECT * FROM appointment where mykid='$mykid' AND appt_status='Not complete'";

                              $r2 = mysqli_query($dbc, $q2); // Run the query.
                              $num2 = mysqli_num_rows($r2);

                              if ($num2 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>
                                <tr>
                                <th>Type of Vaccine </th>
                                <th width="80">Recommended Date </th>                                                                                                    
                                <th> Create Appointment </th>
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r2)) {
                                  $date_now2 = date("Y-m-d H:i:s");
                                  $date_appt2 = date('Y-m-d H:i:s', strtotime($row['appt_start']));
                                  $btndisplay2 = '<a href="addappt.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-success btn-sm"> Set up appointment </a>';
                                  if ($date_appt2 < $date_now2) {
                                    $btndisplay2 = '<a href="addappt.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-danger btn-sm"> Set up appointment </a>';
                                  } else {
                                    $btndisplay2 = '<a href="addappt.php?mykid=' . $row['mykid'] . '&id_appt=' . $row['id_appt'] . '" <button type="button" style="size:5px;"class="btn btn-success btn-sm"> Set up appointment </a>';
                                  }
                                  echo '
                                  <tr>
                                  <td>' . $row['appt_type'] . '</td>
                                  <td>' . date_format(new DateTime($row['appt_start']), 'd/m/Y') . '</td>                                 
                                  <td> ' . $btndisplay2 . '</td>
                                  
                                     
                                  </tr>                                       
                                    ';
                                }
                              }
                              ?>
                            </table>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                              <?php
                              require_once('mysql_connect.php');
                              $mykid = $_GET['mykid'];
                              $query =  "SELECT * FROM appointment where mykid='$mykid' AND appt_status='Completed'";

                              $result = mysqli_query($dbc, $query); // Run the query.
                              $num = mysqli_num_rows($result);

                              if ($num > 0) { // If it ran OK, display the records.

                                //Table header.
                                ?>                      
                                 <thead>
                                    <tr>
                                    <th>Type of Vaccine </th>                                                                                                      
                                    <th> Date of Appointment </th>
                                    <th> View Details </th>                                   
                                    </tr>
                                  </thead>
                              <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  
                                    <tr>
                                    <td><?= $row['appt_type']?></td>
                                    <td><?=date_format(new DateTime($row['appt_start']), 'd/m/Y') ?></td>
                                    <form action="listreports.php" method="post">
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">View details</button>
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">                   
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel"> Appointment Details </h4>
                                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">                                              
                                              <p><b> Patient's :</b> <?=$row['patientName']?> </p>
                                              <p><b> Appointment Type :</b> <?= $row['appt_type']?> </p>
                                              <p><b> Date :</b> <?= date_format(new DateTime($row['appt_start']), 'd/m/Y') ?></p>
                                              <p><b> Time :</b> <?=date_format(new DateTime($row['appt_start']), 'G:ia') ?> </p>
                                              <p><b> Doctor: </b><?= $row['doc_name']?></p>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                              
                                            </div>                   
                                          </div>
                                        </div>
                                      </div> 
                                  </td></form>
                                    
                                    </tr>                                       
                 	                 	<?php
                                }
                              }
                              ?>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane" id="tab_content4" aria-labelledby="profile-tab">

                            <table class="data table table-striped no-margin">
                              <?php
                              require_once('mysql_connect.php');
                              $mykid = $_GET['mykid'];
                              $q3 =  "SELECT * FROM appointment where mykid='$mykid' and appt_status='Dismissed'";

                              $r3 = mysqli_query($dbc, $q3); // Run the query.
                              $num3 = mysqli_num_rows($r3);

                              if ($num3 > 0) { // If it ran OK, display the records.

                                //Table header.
                                echo '                      
                                <thead>
                                <tr>
                                <th>Type of Vaccine </th>                                                                 
                                <th width="200px">Remark</th>
                               
                                </tr>
                              </thead>';

                                while ($row = mysqli_fetch_assoc($r3)) {
                                  echo '
                                    <tr>
                                    <td>' . $row['appt_type'] . '</td>                                                                     
                                    <td>' . $row['remark'] . '</td>

                                    </tr>                                       
                 	                 	';
                                }
                              }
                              ?>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- content -->
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

          <!-- Chart.js -->
          <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
          <!-- jQuery Sparklines -->
          <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

          <!-- Custom Theme Scripts -->
          <script src="../build/js/custom.min.js"></script>

</body>

</html>