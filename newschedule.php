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
              <h3>New schedule</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <?php
          require_once('mysql_connect.php'); // Connect to the db.		
          $mykid = $_GET['mykid'];
          $query = "SELECT * from schedule where mykid='$mykid'";
          $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
          $row = mysqli_fetch_assoc($result);
          ?>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>

                </div>
                <div class="x_content">



                  <p> Name: <?php echo $row["patientName"]; ?> </p>
                  <p> Mykid: <?php echo $row["mykid"]; ?> </p>

                  <div class="alert alert-warning  " role="alert">
                    <button type="button" class="close" data-dismiss="alert" ><span aria-hidden="true">×</span>
                    </button>
                    <strong>Please be aware the system generate schedule based on patient's birth date </strong>
                     Please ensure to update the patient's schedule
                  </div>



                  <a href="printschedule.php?mykid=<?= $mykid ?>"><button type="button" class="btn btn-secondary btn-sm"> Print report </button>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Vaccine Type</th>
                          <th width="100">Age</th>
                          <th>Date of schedule</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Bacillus Calmette–Guérin (BCG) [1st Dose] </br> Hepatitis B (HepB) [1st dose]</th>
                          <td>Newborn</td>
                          <td><?php echo date_format(new DateTime($row["month_0"]), 'd/m/Y'); ?></td>

                        </tr>
                        <th scope="row">Hepatitis B [2nd dose] </th>
                        <td>1 month</td>
                        <td> <?php echo date_format(new DateTime($row["month_1"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row">
                            Diptheria, Tetanus, accellular Pertussis (DTaP) [1st dose]
                            </br> Haemophilus influenzae b (Hib) [1st dose]
                            </br> Inactivated Poliovirus (IPV) [1st dose] </th>
                          <td> 2 months</td>
                          <td><?php echo date_format(new DateTime($row["month_2"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row">
                            Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]
                            </br> Haemophilus influenzae b (Hib) [2nd Dose]
                            </br> Inactivated Poliovirus (IPV) [2nd Dose] </th>
                          <td>3 months </td>
                          <td><?php echo date_format(new DateTime($row["month_3"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row">
                            Diptheria, Tetanus, accellular Pertussis (DTaP) [3rd dose]
                            </br> Haemophilus influenzae b (Hib) [3rd Dose]
                            </br> Inactivated Poliovirus (IPV) [3rd Dose] </th>
                          <td>5 months</td>
                          <td><?php echo date_format(new DateTime($row["month_5"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row"> Hepatitis B (HepB) [3rd Dose] <br> Measles (Sabah only)</th>
                          <td>6 months</td>
                          <td><?php echo date_format(new DateTime($row["month_6"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row">Japanese Encephalitis (JE) (Sarawak only) [1st Dose] </th>
                          <td>10 months</td>
                          <td><?php echo date_format(new DateTime($row["month_10"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row"> Mumps, Measles, Rubella (MMR) [1st dose] </br> Japanese Encephalitis (JE) (Sarawak only) [2nd Dose] </th>
                          <td> 12 months</td>
                          <td><?php echo date_format(new DateTime($row["month_12"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row">Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]</br>
                            Haemophilus influenzae b (Hib) [4th Dose]
                            </br> Inactivated Poliovirus (IPV) [4th Dose]</br>
                            Japanese Encephalitis (Sarawak only) [3rd Dose]</th>
                          <td>18 months</td>
                          <td><?php echo date_format(new DateTime($row["month_18"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row"> Japanese Encephalitis (Sarawak only) [4th Dose]</th>
                          <td> 4 years old</td>
                          <td><?php echo date_format(new DateTime($row["years_4"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row"> BCG (option only if no scar found) </br> Diptheria, Tetanus (DT booster) [1st Dose]
                            </br>Mumps, Measles, Rubella (MMR) [2nd Dose] </th>
                          <td> 7 years old</td>
                          <td><?php echo date_format(new DateTime($row["years_7"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row"> Human papillomavirus (HPV) with 3 doses within 6 months </br>
                            (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose) </th>
                          <td> 13 years old </td>
                          <td><?php echo date_format(new DateTime($row["years_13"]), 'd/m/Y'); ?></td>

                        </tr>
                        <tr>
                          <th scope="row">Tetanus (TT) </th>
                          <td> 15 years old </td>
                          <td><?php echo date_format(new DateTime($row["years_15"]), 'd/m/Y'); ?></td>

                        </tr>

                      </tbody>
                    </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
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
      <?php
      include_once "footer.php";
      ?>
      []