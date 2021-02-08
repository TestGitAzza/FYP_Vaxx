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

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Today's Schedules</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">   
                    <h2> Scheduled Appointment </h2>                       
                  <div class="clearfix"></div>
                </div>
                <div class="col-sm-12">
                      <div class="card-box table-responsive">

                        <table id="datatable" class="table table-striped" style="width:100%">
                          <?php
                          require_once('mysql_connect.php'); // Connect to the db.
                          $today = date('Y-m-d');                         
                          $query = "SELECT * from appointment where appt_status='Scheduled' and date(appt_start)='$today' order by appt_start";
                          $result = mysqli_query($dbc, $query); // Run the query.
                          $num = mysqli_num_rows($result);

                          if ($num > 0) {?>                                            
                             <thead>
                                      <tr>    
                                          <th> Appointment ID </th>                             
                                        <th>Date </th>
                                        <th> Time </th>
                                        <th> Status </th>
                                       
                                      </tr>
                             </thead><?php

                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                                
                                      <tr>     
                                          <td><?= $row['id_appt']?> </td>                                                                       
                                      <td><?= date_format(new DateTime($row['appt_start']), 'd/m/Y') ?></td>
                                      <td><?=date_format(new DateTime($row['appt_start']), 'G:ia') ?></td> 
                                      
                                      <form action="doc_sched.php" method="post">
                                      <td><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">View details</button>
                                      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">                   
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Appointment Details </h4>
                                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">                                              
                                              <p><b> Patient's :</b> <?=$row['patientName']?> </p>
                                              <p><b> Appointment Type :</b> <?= $row['appt_type']?> </p>
                                              <p><b> Date :</b> <?= date_format(new DateTime($row['appt_start']), 'd/m/Y') ?></p>
                                              <p><b> Time :</b> <?=date_format(new DateTime($row['appt_start']), 'G:ia') ?> </p>
                                              <p><b> Doctor : </b><?= $row['doc_name'];?></p>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                              
                                            </div>                   
                                          </div>
                                        </div>
                                      </div>  
                                    </td>
                                      </form>
                                    </tr>                                       
                 	                 		<?php
                            }
                                                     
                          }
                          ?>
                          
                        </table>
                      </div>
                    </div>


                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">   
                    <h2> Completed Schedules </h2>                       
                  <div class="clearfix"></div>
                </div>
                <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped" style="width:100%">
                          <?php
                          require_once('mysql_connect.php'); // Connect to the db.
                          $today = date("Y-m-d");                         
                          $query = "SELECT * from appointment where appt_status='Completed' and date(appt_start)='$today'";
                          $result = mysqli_query($dbc, $query); // Run the query.
                          $num = mysqli_num_rows($result);

                          if ($num > 0) { // If it ran OK, display the records.

                            // Table header.
                            echo '                     
                             <thead>
                                      <tr>
                                        <th>Patients</th>
                                        <th>Appointment Type </th>
                                        <th>Date </th>
                                        <th> Time </th>
                                        <th> Doctor </th>
                                      </tr>
                             </thead>';

                            while ($row = mysqli_fetch_assoc($result)) {
                              echo
                                '
                                      <tr>
                                      <td>' . $row['mykid'] . '</td>
                                      <td>' . $row['appt_type'] . '</td>
                                      <td>' . date_format(new DateTime($row['appt_start']), 'd/m/Y') . '</td> 
                                      <td>' . date_format(new DateTime($row['appt_start']), 'G:i:a') . '</td>
                                      <td>' . $row['doc_name'] .'</td>
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
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php
        include_once "footer.php";
        ?>