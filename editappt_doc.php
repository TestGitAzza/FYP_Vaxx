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
              <h3>Patient's appointment progress</h3>
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
          <?php
        require_once('mysql_connect.php'); // Connect to the db.		
        //$mykid = $_GET['mykid'];
        $query = "SELECT * from user";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2> Doctor's schedule  </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
          <div class="clearfix"></div>
            </div>
              <div class="x_content">

              <!-- <div class="item form-group">
                <label for="fullname" class="col-form-label col-md-3 col-sm-3 label-align"> Slot 1 </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input id="fullname" class="form-control" readonly="readonly" type="text" name="fullname" value="<?php echo $row["fullname"]; ?>">
                  </div>
              </div> -->
              <div class="item form-group">
                <label for="fullname" class="col-form-label col-md-3 col-sm-3 label-align"> Slot 1 </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input id="fullname" class="form-control" readonly="readonly" type="text" name="fullname" value="">
                  </div>
              </div>

              

            </div>
        </div>
      </div>
          <div class="row">
            <?php
            require_once('mysql_connect.php'); // Connect to the db.		
            $mykid = $_GET['mykid'];
            $id_appt = $_GET['id_appt'];
            $query = "SELECT * from appointment where mykid='$mykid' AND id_appt='$id_appt'";

            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Update patient's progress <small>Mykid : <?php echo $row["mykid"]; ?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <form action="editappt.php?mykid=<?= $_GET['mykid'] ?>&id_appt=<?= $_GET['id_appt'] ?>" method="post">

                    <div class="item form-group">
                      <label for="appt_type" class="col-form-label col-md-3 col-sm-3 label-align"> Vaccine Type <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_type" class="form-control" readonly="readonly" type="text" name="appt_type" value="<?php echo $row["appt_type"]; ?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="appt_rec" class="col-form-label col-md-3 col-sm-3 label-align"> Date taken <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_rec" class="form-control" readonly="readonly" type="text" name="appt_rec" value="<?php echo date_format(new DateTime($row['appt_start']), 'Y-m-d H:i:s') ?>">
                      <!-- echo date_format(new DateTime($row['appt_start']) -->
                      </div>
                    </div>

                    <!-- <div class="item form-group">
                      <label for="appt_start" class="col-form-label col-md-3 col-sm-3 label-align"> Select Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_start" class="form-control" type="datetime-local" name="appt_start" value="<?php echo $row["appt_start"]; ?>">
                      </div>
                    </div> -->

                    <!-- <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Select Doctor</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="doctor" class="form-control">
                          <option>Choose option</option>
                          <option>Doctor A</option>
                          <option>Doctor B</option>
                          <option>Doctor C</option>
                          <option>Doctor D</option>
                        </select>
                      </div>
                    </div> -->

                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <a href="patientprofile.php?mykid=<?= $mykid ?>&id_appt=<?= $id_appt ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit" values="submit" name="submit"> Update </button>
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
        if (empty($errors)) {
          // $mykid = $_POST['mykid'];
          $id_appt = $_POST['id_appt'];

          //$date = strtotime($row['appt_start']);
          $query = "UPDATE appointment SET appt_start='" . $_POST['appt_start'] . "', appt_status='Scheduled', doctor='".$_POST['doctor']."' 
          WHERE id_appt=$id_appt";
          
          $result = mysqli_query($dbc, $query);

      ?>

          <script type="text/javascript">
            function confirmAlert() {
              alert("Appointment has been updated");
            }
            confirmAlert();
            window.location.href ='patientprofile.php?mykid=<?= $mykid ?>&id_appt=<?= $id_appt ?>';
          </script>
      <?php
        }
      }
      ?>
      <!-- /page content -->

      <?php
      include_once "footer.php";
      ?>