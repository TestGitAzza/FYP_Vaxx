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
              <h3>Set Up Appointment</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
          <div class="row">        
            <?php
            require_once('mysql_connect.php');
            $mykid = $_GET['mykid'];
            $id_appt = $_GET['id_appt'];
            $query = "SELECT * from appointment where mykid='$mykid' AND id_appt='$id_appt'";
            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> Add new appointment <small>Mykid : <?php echo $row["mykid"]; ?></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <form action="addtest.php?mykid=<?= $_GET['mykid'] ?>&id_appt=<?= $_GET['id_appt'] ?>" method="post">
                    <div class="item form-group">
                      <label for="appt_type" class="col-form-label col-md-3 col-sm-3 label-align"> Vaccine Type <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_type" class="form-control" readonly="readonly" type="text" name="appt_type" value="<?php echo $row["appt_type"]; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="appt_rec" class="col-form-label col-md-3 col-sm-3 label-align"> Recommended Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_rec" class="form-control" readonly="readonly" type="text" name="appt_rec" value="<?php echo date_format(new DateTime($row['appt_start']), 'd/m/Y') ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="appt_start" class="col-form-label col-md-3 col-sm-3 label-align"> Select Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="appt_start" class="form-control" type="hidden" name="appt_start" value="<?= $row["appt_start"]; ?>" required>
                        <input id="appt_end" class="form-control" type="hidden" name="appt_end" value="<?= $row["appt_end"]; ?>" required> </p>
                        <input id="appt_add" class="form-control" type="datetime-local" name="appt_add" value=""></p>
                        <button class="btn btn-info" type="submit" values="submit" name="check"> Check </button>

                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <a href="patientprofile.php?mykid=<?= $mykid ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <input type="hidden" name="id_appt" value="<?php echo $_GET['id_appt']; ?>">
                        </div>
                      </div>
                    </form>

                        <?php //btn check
                        if (isset($_POST['check'])) {
                          if (empty($errors)) {
                            $appt_start =  $_POST['appt_start'];
                            $appt_end =  $_POST['appt_end'];
                            $appt_add =  $_POST['appt_add'];

                            $query2 = "SELECT * FROM doctor WHERE doc_id NOT IN (SELECT d.doc_id FROM appointment as a INNER JOIN doctor as d ON a.doc = d.doc_id 
                              WHERE doc != 0 and '$appt_add' between appt_start and appt_end group by doc)";

                            $result2 = mysqli_query($dbc, $query2) or die(mysqli_error($dbc));
                            $num = mysqli_num_rows($result2);

                            if ($num > 0) {
                        ?>
                              <table id="datatable-buttons" class="table table-striped" style="width:100%">
                                <thead>
                                  <tr>
                                    <th width="20px"> Doctor ID </th>
                                    <th>Doctor Available</th>
                                    <th> Assign Doctor </th>
                                  </tr>
                                </thead>
                                <?php
                                while ($row2 = mysqli_fetch_assoc($result2)) {

                                  $add = date_create($appt_add);
                                  $add = date_format($add, "Y-m-d G:i:a"); //appt_add
                                  $appt_end = $_POST['appt_add'];
                                  $e = date_create($appt_end);
                                  $e->modify('+30minutes');
                                  $e = date_format($e, "Y-m-d G:i:a"); //appt_end
                                ?>
                                  <tr>
                                    <input id="add" class="form-control" type="hidden" name="add" value='<?= $add ?>' required>
                                    <input id="add_end" class="form-control" type="hidden" name="add_end" value='<?= $e ?>'>
                                    <td><?= $row2['doc_id'] ?></td>
                                    <td><?= $row2['doc_name'] ?></td>
                                    <!-- <td><button class="btn btn-success" type="submit" values="submit" name="submit"> Set up appointment </button> </a></td> -->

                                    <form action="addtest.php?mykid=<?= $_GET['mykid'] ?>id_appt=<?= $_GET['id_appt'] ?>&doc_id<?= $_GET['doc_id'] ?>" method="post">
                                      <td>
                                        <div class="input-group">
                                          <input type="hidden" name="mykid" value="<?= $row['mykid'] ?>" />
                                          <input type="hidden" name="id_appt" value="<?= $row['id_appt'] ?>" />
                                          <input type="hidden" name="doc_id" value="<?= $row2['doc_id'] ?>" />
                                          <button type="submit" name="submit" value="<?= $row2['doc_id'] ?>" class="btn btn-success">Set up appointment</button>
                                        </div>
                                      </td>
                                    </form>

                                  <!-- if form luar, ambik last row. all functional. 
                                   if form here. only first row. other button not functional.
                                  if divide two form, date and time undefined button functional -->
                                  <?php
      if (isset($_POST['submit'])) {
        if (empty($errors)) {
          $add = $_POST['add'];

          $query = "UPDATE appointment SET appt_start='" . $_POST['add'] . "',appt_end='" . $_POST['add_end'] . "',  appt_status='Scheduled', doc='" . $_POST['doc_id'] . "'
          WHERE id_appt=$id_appt";
          $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
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
      ?>
                                  </tr> <?php }   //end for while     ?>
                              </table>
                        <?php
                            } //end of num > 0
                             else {
                              echo "No Doctor available. Please select another date/time";
                            } //end of else 
                          } //end of empty error
                        } //end of if check
                        
                        //dsdhjasdhsj
                        ?>
                      </div> 
                      <!-- content row -->
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