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
              <h3> Print schedule </h3>

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
                    echo "DATE: " . date("D-m-y h:i:sa"); ?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">

                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <?php
                          require_once('mysql_connect.php'); // Connect to the db.		
                          $mykid = $_GET['mykid'];
                          $query = "SELECT * from schedule where mykid='$mykid'";
                          $result = mysqli_query($dbc, $query); // Run the query.
                          $num = mysqli_num_rows($result);

                          if ($num > 0) { // If it ran OK, display the records.

                            // Table header.
                            echo '                      
                     <thead>
                     <tr>
                     <th width="2"> Number </th>
                     <th>Type of Vaccine </th>
                     <th> Schedule </th>
                     <th width="200">Date Schedule</th>

                   </tr>
                 </thead>';

                            while ($row = mysqli_fetch_assoc($result)) {
                              echo

                                '
                 <tr><td width="2"> 1 </td>
                        <td>Bacillus Calmette–Guérin (BCG) [1st Dose] <br>
                        Hepatitis B (HepB) [1st dose]  </td>
                        <td>Newborn </td>
                        <td>' . date_format(new DateTime($row['month_0']), 'd/m/Y') . '</td>
                 </tr>

                 <tr>
                 <td width="2"> 2 </td>
                 <td> Hepatitis B [2nd dose]<br></td>
                 <td>1 month </td>
                 <td>' . date_format(new DateTime($row['month_1']), 'd/m/Y') . '</td>
              </tr>

              <tr>
              <td width="2"> 3 </td>
              <td>
              Diptheria, Tetanus, accellular Pertussis (DTaP) [1st dose] 
                            </br> Haemophilus influenzae b (Hib) [1st dose] 
                            </br> Inactivated Poliovirus (IPV) [1st dose] </th>
                            <td> 2 months</td>
              <td>' . date_format(new DateTime($row['month_2']), 'd/m/Y') . '</td>
           </tr>

           <tr>
           <td width="2"> 4 </td>
           <td>
           Diptheria, Tetanus, accellular Pertussis (DTaP) [3rd dose] 
           </br> Haemophilus influenzae b (Hib) [3rd Dose] 
           </br> Inactivated Poliovirus (IPV) [3rd Dose] </th>
           <td>5 months</td>
           <td>' . date_format(new DateTime($row['month_5']), 'd/m/Y') . '</td>
        </tr>

        <tr>
        <td width="2"> 5 </td>
        <td>
        Hepatitis B (HepB) [3rd Dose] <br> Measles (Sabah only)</th>
                            <td>6 months</td>
        <td>' . date_format(new DateTime($row['month_6']), 'd/m/Y') . '</td>
     </tr>   

     <tr>
     <td width="2"> 6 </td>
     <td>
     Japanese Encephalitis (JE) (Sarawak only) [1st Dose] </th>
     <td>10 months</td>
     <td>' . date_format(new DateTime($row['month_10']), 'd/m/Y') . '</td>
  </tr>   

  <tr>
  <td width="2"> 7 </td>
  <td>
  Mumps, Measles, Rubella (MMR) [1st dose] </br> Japanese Encephalitis  (JE) (Sarawak only) [2nd Dose] </th>
                            <td> 12 months</td>
  <td>' . date_format(new DateTime($row['month_12']), 'd/m/Y') . '</td>
</tr>

<tr>
<td width="2"> 8 </td>
<td>
[ 4th dose] </br> DTP </br> Hib </br> IPV </br> 
                            [3rd dose] </br> JE (Sarawak only)</th>
                            <td>18 months</td>
<td>' . date_format(new DateTime($row['month_18']), 'd/m/Y') . '</td>
</tr>

<tr>
<td width="2"> 9 </td>
<td>
4th dose: JE (Sarawak only)</th>
                            <td> 4 years old</td>
<td>' . date_format(new DateTime($row['years_4']), 'd/m/Y') . '</td>
</tr>

<tr>
<td width="2"> 10 </td>
<td>
BCG (option only if no scar found) </br> Diptheria, Tetanus  (DT booster)
                            </br>2nd dose of MMR</th>
                            <td> 7 years old</td>
<td>' . date_format(new DateTime($row['years_7']), 'd/m/Y') . '</td>
</tr>

<tr>
<td width="2"> 11 </td>
<td>
Human papillomavirus (HPV) with 3 doses within 6 months </br> 
(2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose) </th>
<td> 13 years old </td>
<td>' . date_format(new DateTime($row['years_13']), 'd/m/Y') . '</td>
</tr>

<tr>
<td width="2"> 12 </td>
<td>
Tetanus (TT) </th>
                            <td> 15 years old </td>
<td>' . date_format(new DateTime($row['years_15']), 'd/m/Y') . '</td>
</tr>

                         ';
                            }

                            echo '</table>';

                            mysqli_free_result($result); // Free up the resources.	
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