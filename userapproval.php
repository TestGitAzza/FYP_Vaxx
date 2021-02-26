<?php
include_once "header.php";
if ($_SESSION['user_role'] != "Admin" && $_SESSION['user_role']) {
  // header('location: index.php');
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
              <h3>Role and Approval</h3>
            </div>
          </div>

          <div>
            <?php
            if (isset($_POST['update'])) {

              if ($_POST['user_role'] == "") {
                $errors[] = 'You forgot to select the role.';

              } else {
                $user_role = trim($_POST['user_role']);
              }
              if (empty($errors)) {
                $id = $_POST['id'];                
                include_once "mysql_connect.php";
                $query = "UPDATE user SET user_role='$user_role' WHERE id=$id";

                $result = mysqli_query($dbc, $query);
                if ($result) {
                  $user_fullname = $_POST['user_fullname'];
                  $doc_name = $_POST['user_name'];
                  $user_email = $_POST['user_email'];
                  if ($_POST['user_role'] == "Doctor") {
                  $query = "INSERT INTO doctor(doc_id, doc_name, doc_username, doc_email) 
                  VALUES ('$id', '$user_fullname', '$doc_name', '$user_email')";
                  $result = mysqli_query($dbc, $query);
                  }
            ?>
                  <script>
                    function confirmAlert() {
                      alert("Selected user has been updated.");
                    }
                    confirmAlert();
                  </script>
            <?php
                  echo "<meta http-equiv='refresh' content='0;url=userapproval.php'>";
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
            ?>
          </div>
        </div>


        <?php
        include "mysql_connect.php";
        $query = 'SELECT * FROM user WHERE user_role="Admin"	'; //admin roles 
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <?php
        }
        ?>

        <div class="x_content">
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Pending</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php
                $query = 'SELECT * FROM user WHERE user_role="Pending"';
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <div class="col-md-4 col-sm-4  profile_details">
                    <div class="well profile_view">
                      <div class="col-sm-12">
                        <div class="left col-sm-7">
                          <h2><?= $row['user_name'] ?></h2>
                          <p name="user_fullname"><strong>Full Name: </strong> <?= $row['user_fullname'] ?> </p>
                          <ul class="list-unstyled">
                            <li><i class="fa fa-envelope"></i> Email: <?= $row['user_email'] ?></li>
                          </ul>
                        </div>
                        <div class="right col-sm-5 text-center">
                          <img src="user_img/<?php
                                              if ($row['user_dp'] == '') {
                                                echo 'user.png';
                                              } else {
                                                echo $row['user_dp'];
                                              } ?>" alt="" class="img-circle img-fluid">
                        </div>
                      </div>
                      <div class="bottom text-center">
                        <div class=" col-sm-12 emphasis">
                          <form action="userapproval.php" method="post">
                            <div class="input-group">
                              <select name="user_role" class="form-control" style="font-size:14px">
                                <?php
                                if ($_SESSION['user_role'] == "Admin") {
                                ?>
                                  <option value="Admin" <?php if ($row["user_role"] == "Admin") {
                                                          echo "selected";
                                                        } ?>>Admin</option>
                                  <option value="Doctor" <?php if ($row["user_role"] == "Doctor") {
                                                            echo "selected";
                                                          } ?>>Doctor</option>
                                <?php
                                }
                                ?>
                                <option value="Admin" <?php if ($row["user_role"] == "Admin") {
                                                        echo "selected";
                                                      } ?>>Admin</option>
                                <option value="Doctor" <?php if ($row["user_role"] == "Doctor") {
                                                          echo "selected";;
                                                        } ?>>Doctor</option>
                                <option value="Pending" <?php if ($row["user_role"] == "Pending") {
                                                          echo "selected";
                                                        } ?>>Pending</option>
                                <option value="Reject" <?php if ($row["user_role"] == "Reject") {
                                                          echo "selected";
                                                        } ?>>Reject</option>
                              </select>
                              <span class="input-group-btn">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <input type="hidden" name="user_fullname" value="<?= $row['user_fullname'] ?>" />
                                <input type="hidden" name="user_name" value="<?= $row['user_name'] ?>" />
                                <input type="hidden" name="user_email" value="<?= $row['user_email'] ?>" />
                                <button name="update" type="submit" class="btn btn-primary" style="font-size:14px">Update Role</button>
                              </span>

                  
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Reject</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php
                $query = 'SELECT * FROM user WHERE user_role="Reject"';

                $result = mysqli_query($dbc, $query);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <div class="col-md-4 col-sm-4  profile_details">
                    <div class="well profile_view">
                      <div class="col-sm-12">
                        <div class="left col-sm-7">
                          <h2><?= $row['user_name'] ?></h2>
                          <p><strong>Full Name: </strong> <?= $row['user_fullname'] ?> </p>
                          <ul class="list-unstyled">
                            <li><i class="fa fa-envelope"></i> Email: <?= $row['user_email'] ?></li>
                          </ul>
                        </div>
                        <div class="right col-sm-5 text-center">
                          <img src="user_img/<?php
                                              if ($row['user_dp'] == '') {
                                                echo 'user.png';
                                              } else {
                                                echo $row['user_dp'];
                                              } ?>" alt="" class="img-circle img-fluid">
                        </div>
                      </div>
                      <div class="bottom text-center">
                        <div class=" col-sm-12 emphasis">

                          <div class="input-group">
                            <select name="user_role" class="form-control" style="font-size:14px">
                              <?php
                              if ($_SESSION['user_role'] == "Admin") {
                              ?>
                                <option value="Admin" <?php if ($row["user_role"] == "Admin") {
                                                        echo "selected";
                                                      } ?>>Admin</option>
                              <?php
                              }
                              ?>
                              <option value="Pending" <?php if ($row["user_role"] == "Pending") {
                                                        echo "selected";
                                                      } ?>>Pending</option>
                              <option value="Reject" <?php if ($row["user_role"] == "Reject") {
                                                        echo "selected";
                                                      } ?>>Reject</option>
                            </select>
                            <span class="input-group-btn">
                              <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                              <button name="update" type="submit" class="btn btn-primary" style="font-size:14px">Update Role</button>
                            </span>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php

  ?>
  <!-- /page content -->

  <?php
  include_once "footer.php";
  ?>