<?php
include_once "header.php";
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <style>

      </style>
      <?php
      include_once "sidebar.php";
      include_once "nav.php";
      ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3> Check slot </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <?php
            require_once('mysql_connect.php'); // Connect to the db.
            $mykid = $_GET['mykid'];
            $id_appt = $_GET['id_appt'];
            // $query = "SELECT user.user_fullname AS u, appointment.id_appt, appointment.appt_type, appointment.appt_end, appointment.appt_start, appointment.appt_status AS a
            // from user, appointment where mykid='$mykid' AND id_appt='$id_appt'";

            $query = "SELECT * from appointment where mykid='$mykid' AND id_appt='$id_appt'";

            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Check Date Availability <small>Mykid : <?php echo $row["mykid"]; ?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <form action="assigndoc.php?mykid=<?= $_GET['mykid'] ?>&id_appt=<?= $_GET['id_appt'] ?>" method="post">

                    <div class="item form-group">
                      <label for="appt_type" class="col-form-label col-md-3 col-sm-3 label-align"> Vaccine Type <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_type" class="form-control" readonly="readonly" type="text" name="appt_type" value="<?php echo $row["appt_type"]; ?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="appt_start" class="col-form-label col-md-3 col-sm-3 label-align"> Recommended Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_start" class="form-control" readonly="readonly" type="text" name="appt_start" value="<?php echo date_format(new DateTime($row['appt_start']), 'd/m/Y') ?>">
                       
                      </div>
                    </div>

                    <!-- <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Select time </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="time" class="form-control">
                          <?php for ($hours = 0; $hours < 6; $hours++) // the interval for hours is '1'
                            for ($mins = 0; $mins < 60; $mins += 30) // the interval for mins is '30'
                              echo '<option value="<?php echo $row["appt_start"]; ?>' . str_pad($hours, 2, '0', STR_PAD_LEFT) . ':'
                                . str_pad($mins, 2, '0', STR_PAD_LEFT) . '</option>';
                          ?>
                        </select>

                      </div>
                    </div> -->

                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="patientprofile.php?mykid=<?= $mykid ?>&id_appt=<?= $id_appt ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit" values="submit" name="submit"> Check Slot </button>
                        <input type="hidden" name="id_appt" value="<?php echo $_GET['id_appt']; ?>">
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php

      if (isset($_POST['submit'])) {
        //if (empty($errors)) {

        if (empty($errors)) {

          $now = new DateTime();
          $id_appt = $_POST['id_appt'];
          $appt_start = $_POST['appt_start'];
          $querycdate = "SELECT * FROM schedule_doc where appt_start = '" . $appt_start . "'";
          $resultdate = mysqli_query($dbc, $querycdate);

          if (mysqli_num_rows($resultdate) < $now) {
      ?> <script type='text/javascript'>
              alert('Date les than now');
            </script> 
            <?php
          // } elseif (mysqli_num_rows($resultdate) < $now) { ?>
          //   <script type='text/javascript'>
          //   alert('Selected date has passed. Please select another');
          // </script> <?php
          }
                     else {
                      //$date = strtotime($row['appt_start']);
          //             $query = "UPDATE appointment SET appt_start='" . $_POST['appt_start'] . "', appt_status='Scheduled', doctor='" . $_POST['doctor'] . "'
          // WHERE id_appt=$id_appt";

          //             $result = mysqli_query($dbc, $query);
                    
                      ?>

          <script type="text/javascript">
            function confirmAlert() {
              alert("Appointment has been updated");
            }
            confirmAlert();
            window.location.href = 'patientprofile.php?mykid=<?= $mykid ?>&id_appt=<?= $id_appt ?>';
          </script>

      <?php
                    }
        }
      }
      ?>
      <!-- /page content -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
      <?php
      include_once "footer.php";
      ?>