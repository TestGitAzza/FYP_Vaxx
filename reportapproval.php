<?php
include_once "header.php";
include "mysql_connect.php";
if ($_SESSION['user_role'] != "Admin" && $_SESSION['user_role'] != "Moderator") {
  header('location: index.php');
}
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
              <h3>Report Approval</h3>
            </div>

          </div>

          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Report List <small>Approve / Reject report status here</small></h2>

                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div><?php
                            if (isset($_POST['update'])) {

                              if ($_POST['update'] == "Approve") {
                                $rep_status = "In Progress";
                                if ($_POST['rep_assign_to'] == "") {
                                  $errors[] = 'You forgot to select the executor.';
                                } else {
                                  $rep_assign_to = trim($_POST['rep_assign_to']);
                                }
                              } else {
                                $rep_status = "Rejected";
                                $rep_assign_to = "";
                              }
                              if (empty($errors)) {
                                $id = $_POST['id'];
                                $curr_date = date('Y-m-d H:i:s');
                                include_once "mysql_connect.php";
                                $query = "UPDATE report SET rep_status='$rep_status', rep_last_update='$curr_date', rep_assign_to='$rep_assign_to' WHERE id=$id";
                                $result = mysqli_query($dbc, $query);
                                if ($result) {
                            ?>
                              <script>
                                function confirmAlert() {
                                  alert("Selected report has been updated.");
                                }
                                confirmAlert();
                              </script>
                        <?php
                                  echo "<meta http-equiv='refresh' content='0;url=reportapproval.php'>";

                                  exit();
                                } else {
                                  echo '<h1>System Error</h1>
      <p>You could not be registered due to a system error. We apologize for any incovenience.</p>';
                                  echo '<p>' . mysqli_error($dbc) . '<br /><br />' . $query . '</p>';
                                  exit();
                                }

                                mysqli_close($dbc);
                              } else {

                                echo '<h1>Error!</h1>
   <p>The following error(s) occurred:<br />';
                                foreach ($errors as $msg) {
                                  echo "- $msg<br />\n";
                                }
                                echo '</p><p>Please try again.</p><p><br /></p>';
                              }
                            }
                        ?></div>
                      <div class="card-box table-responsive">
                        <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Ticket ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Department</th>
                              <th>Area</th>
                              <th>Issue</th>
                              <th>Date</th>
                              <th>Upload</th>
                              <th>Status</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                            $query = 'SELECT * FROM report WHERE rep_status = "Pending" ORDER BY rep_date DESC';

                            $result = mysqli_query($dbc, $query);

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <tr>
                                <td><?= $row['rep_ticketid'] ?></td>
                                <td><?= $row['rep_fullname'] ?></td>
                                <td><?= $row['rep_email'] ?></td>
                                <td><?= $row['rep_department'] ?></td>
                                <td><?= $row['rep_area'] ?></td>
                                <td><?= $row['rep_issue'] ?></td>
                                <td><?= $row['rep_date'] ?></td>
                                <td><img src="rep_img/<?= $row['rep_upload'] ?>" alt="img" width="100px" class="zoom"></td>
                                <td>
                                  <form action="reportapproval.php" method="post">
                                    <div class="input-group">
                                      <select name="rep_assign_to" class="form-control" style="font-size:14px" required>
                                        <option value="">Choose Executor</option>
                                        <option value="Civil Executor">Civil Executor</option>
                                        <option value="ME Executor">ME Executor</option>
                                      </select>
                                    </div>
                                    <div class="input-group">
                                      <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                      <input type="submit" name="update" class="btn btn-primary" style="font-size:14px" value="Approve" onclick="return confirm('Are you sure to approve this report?')">
                                    </div>
                                  </form>
                                  <form action="reportapproval.php" method="post">
                                    <div>
                                      <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                      <input type="submit" name="update" class="btn btn-danger" style="font-size:14px" value="Reject" onclick="return confirm('Are you sure to reject this report?')">
                                    </div>
                                  </form>
                                </td>
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
          </div>
        </div>
      </div>
      <!-- /page content -->

      <?php
      include_once "footer.php";
      ?>