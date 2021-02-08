<?php
include_once "header.php";
include_once "mysql_connect.php";
if ($_SESSION['user_role'] == "ME Executor" && $_SESSION['user_role'] == "Civil Executor" && $_SESSION['user_role'] == "Admin") {
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
              <h3>Report Update</h3>
            </div>

          </div>

          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Report List <small>Update report status here</small></h2>

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

                              if ($_POST['rep_status'] == "") {
                                $errors[] = 'You forgot to select the status.';
                              } else {
                                $rep_status = mysqli_real_escape_string($dbc,trim($_POST['rep_status']));
                              }

                              if ($_POST['rep_comment'] == "") {
                                $errors[] = 'You forgot to insert the comment.';
                              } else {
                                $rep_comment = mysqli_real_escape_string($dbc,trim($_POST['rep_comment']));
                              }

                              if (empty($errors)) {
                                $id = $_POST['id'];
                              
                                if($_POST['rep_status'] == "In Progress"){
                                  $rep_cid = 0;
                                }else{
                                  $rep_cid = $_SESSION['id'];
                                }
                                $query = "UPDATE report SET rep_status='$rep_status', rep_comment='$rep_comment', rep_cid='$rep_cid' WHERE id=$id";
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
                                  echo "<meta http-equiv='refresh' content='0;url=reportupdate.php'>";

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
                              <th>Department</th>
                              <th>Area</th>
                              <th>Issue</th>
                              <th>Date</th>
                              <th>Upload</th>
                              <th>Status</th>
                              <th>Comment</th>
                              <th>Update</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if($_SESSION['user_role'] == "Civil Executor"){
                              $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") AND (rep_assign_to = "Civil Executor" OR rep_uid = "'.$_SESSION["id"].'") ORDER BY rep_date DESC';  
                            }else if($_SESSION['user_role'] == "ME Executor"){
                              $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") AND (rep_assign_to = "ME Executor" OR rep_uid = "'.$_SESSION["id"].'") ORDER BY rep_date DESC';  
                            }else if($_SESSION['user_role'] == "Issuer"){
                              $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") AND rep_uid = "'.$_SESSION["id"].'" ORDER BY rep_date DESC';  
                            }else{
                              $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") ORDER BY rep_date DESC';  
                            }
                            $result = mysqli_query($dbc, $query);

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <tr>
                                <td><?= $row['rep_ticketid'] ?></td>
                                <td><?= $row['rep_fullname'] ?></td>
                                <td><?= $row['rep_department'] ?></td>
                                <td><?= $row['rep_area'] ?></td>
                                <td><?= $row['rep_issue'] ?></td>
                                <td><?= $row['rep_date'] ?></td>
                                <td><img src="rep_img/<?= $row['rep_upload'] ?>" alt="img" width="100px" class="zoom"></td>
                                <form action="reportupdate.php" method="post">
                                  <td>
                                    <div class="input-group">
                                      <select name="rep_status" class="form-control" style="font-size:14px">
                                        <option value="In Progress" <?php if ($row["rep_status"] == "In Progress") {
                                                                      echo "selected";
                                                                    } ?>>In Progress</option>
                                        <option value="Complete" <?php if ($row["rep_status"] == "Complete") {
                                                                    echo "selected";
                                                                  } ?>>Complete</option>
                                        <option value="Require 3rd Party" <?php if ($row["rep_status"] == "Require 3rd Party") {
                                                                            echo "selected";
                                                                          } ?>>Require 3rd Party</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <textarea class="form-control" rows="3" name="rep_comment" required><?= $row["rep_comment"] ?></textarea>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <input type="hidden" name="curr_status" value="<?= $row['rep_status'] ?>" />
                                      <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                      <button type="submit" name="update" class="btn btn-primary" style="font-size:14px">Update</button>
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
          </div>
        </div>
      </div>
      <!-- /page content -->

      <?php
      include_once "footer.php";
      ?>