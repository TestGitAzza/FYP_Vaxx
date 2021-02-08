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
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
      </head>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Appointments <small> All patients </small></h3>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>
                    <?php
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    echo "DATE: " . date("d-m-y G:i:a"); ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- <div class="card-box table-responsive">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Generate report</button>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel2">Choose report</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <a href="reportappointment.php"><button type="button" class="btn btn-success">Report All Apointment</button>
                                  <a href="reportsched.php"><button type="button" class="btn btn-info">Report Scheduled</button>
                                    <a href="reportcomplete.php"><button type="button" class="btn btn-warning">Report Completed</button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div> -->

                        <table id="datatable-buttons" class="table table-striped" style="width:100%">

                          <thead>
                            <tr>
                              <th> Patient Mykid </th>
                              <th>Type of Vaccine </th>
                              <th width="200">Date Schedule</th>
                              <th width="100">Time Schedule</th>
                              
                              <th>Update</th>
                            </tr>
                          </thead>
                          <?php
                          require_once('mysql_connect.php');
                          $id = $_SESSION['id'];
                          $query = "SELECT * from appointment where doc='$id' and appt_status='Scheduled'";

                          $result = mysqli_query($dbc, $query);

                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <tr>
                              <td><?= $row['mykid'] ?></td>
                              <td><?= $row['appt_type'] ?></td>
                              <td><?= date_format(new DateTime($row['appt_start']), 'd/m/Y') ?></td>
                              <td><?= date_format(new DateTime($row['appt_start']), 'G:ia') ?></td>
                              
                              <form action="listappment_sch.php" method="post">
                                <td>
                                  <div class="input-group">
                                    <input type="hidden" name="mykid" value="<?= $row['mykid'] ?>" />
                                    <input type="hidden" name="id_appt" value="<?= $row['id_appt'] ?>" />
                                    <div class="col-md-6 col-sm-6 ">
                                      <textarea class="form-control" rows="3" placeholder="Remarks" name="remark" value="<?= $row['remark'] ?>"></textarea>
                                    </div><br>
                                    <div class="col-md-6 col-sm-6">
                                    <button type="submit" name="update" class="btn btn-success" onclick="return confirm('Complete this appointment? Action cannot be undone')" style="font-size:14px">Complete</button>                                  
                                    </div></div>
                                </td>
                              </form>
                            </tr>
                          <?php
                          }
                          ?>
                          </tbody>
                        </table>

                      </div>
                    </div>


                  </div>


                </div>


              </div>
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="green">
                      Completed</h2>
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

                            <thead>
                              <tr>
                                <th> Patient Mykid </th>
                                <th>Type of Vaccine </th>
                                <th width="200">Date Schedule</th>
                                <th width="100">Time Schedule</th>
                                <th width="100">Remark</th>
                              </tr>
                            </thead>
                            <?php
                            require_once('mysql_connect.php');
                            $id = $_SESSION['id'];
                            $query = "SELECT * from appointment where doc='$id' AND appt_status='Completed'";

                            $result = mysqli_query($dbc, $query);

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <tr>
                                <td><?= $row['mykid'] ?></td>
                                <td><?= $row['appt_type'] ?></td>
                                <td><?= date_format(new DateTime($row['appt_start']), 'd/m/Y') ?></td>
                                <td><?= date_format(new DateTime($row['appt_start']), 'G:ia') ?></td>                               
                                <td><?= $row['remark'] ?></td>
                                <form action="listappment_sch.php" method="post">
                                  <td>
                                    <div class="input-group">
                                      <input type="hidden" name="mykid" value="<?= $row['mykid'] ?>" />
                                      <input type="hidden" name="id_appt" value="<?= $row['id_appt'] ?>" />
                                    </div>
                                  </td>
                                </form>
                              </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                          </table>

                        </div>
                      </div>
                    </div>


                  </div>


                </div>
              </div>

              <?php
              if (isset($_POST['update'])) {
                if (empty($errors)) {
                  $mykid = $_POST['mykid'];
                  $id_appt = $_POST['id_appt'];

                  $query = "UPDATE appointment SET appt_status='Completed', remark='" . $_POST['remark'] . "' WHERE id_appt='$id_appt'";
                  $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));

              ?>
                  <script type="text/javascript">
                    function confirmAlert() {
                      alert("Appointment Completed");
                    }
                  </script>
              <?php

                }
              }
              ?>


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
              <!-- <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script> -->
              <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

              <!-- Custom Theme Scripts -->
              <script src="../build/js/custom.min.js"></script>

</body>

</html>