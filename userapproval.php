<?php
include_once "header.php";
if ($_SESSION['user_role'] != "Admin" && $_SESSION['user_role'] != "Moderator") {
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

          <div class="clearfix"></div>
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
          <div class="row">
            <div class="x_panel">
              <!-- <div class="x_title">
                <h2>Admin</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div> -->
              <div class="x_content">
                <?php
                include "mysql_connect.php";
                $query = 'SELECT * FROM user WHERE user_role="Admin"	';

                $result = mysqli_query($dbc, $query);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <!-- <div class="col-md-4 col-sm-4  profile_details">
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
                            <img src="user_img/
                            <?php
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
                              <select 
                              <?php
                              if ($_SESSION['user_role'] == "Admin") {
                                echo "disabled";
                              }
                              ?> name="user_role" class="form-control" style="font-size:14px">
                                <option value="Admin" <?php if ($row["user_role"] == "Admin") {
                                                        echo "selected";
                                                      } ?>>Admin</option>
                                <option value="Moderator" <?php if ($row["user_role"] == "Moderator") {
                                                            echo "selected";
                                                          } ?>>Moderator</option>
                                <option value="Civil Executor" <?php if ($row["user_role"] == "Civil Executor") {
                                                                  echo "selected";
                                                                } ?>>Civil Executor</option>
                                <option value="ME Executor" <?php if ($row["user_role"] == "ME Executor") {
                                                              echo "selected";
                                                            } ?>>ME Executor</option>
                                <option value="Issuer" <?php if ($row["user_role"] == "Issuer") {
                                                          echo "selected";
                                                        } ?>>Issuer</option>
                                <option value="Monitor" <?php if ($row["user_role"] == "Monitor") {
                                                          echo "selected";
                                                        } ?>>Monitor</option>
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
                  </div> -->
                  <!-- <?php
                      }
                        ?>
              </div>
            </div> -->

                  <div class="col-md-12 col-sm-12  ">
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
                          <form action="userapproval.php" method="post">
                            <div class="col-md-4 col-sm-4  profile_details">
                              <div class="well profile_view">
                                <div class="col-sm-12">
                                  <div class="left col-sm-7">
                                    <h2><?= $row['user_name'] ?></h2>
                                    <p name="user_fullname"><strong>Full Name: </strong> <?= $row['user_fullname'] ?> </p>
                                    <ul class="list-unstyled" name="user_email">
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
                                          <button name="update" type="submit" class="btn btn-primary" style="font-size:14px">Update Role</button>
                                        </span>
                                      </div>
                                      <?php
                                      // $user_fullname = $row['user_fullname'];
                                      // $user_email = $row['user_email'];
                                      
                                      $user_fullname = $_POST['user_fullname'];           
                                      $user_email = $_POST['user_email'];            

                                      $query = "INSERT into doctor (doc_userID, doc_name, doc_username, doc_email, doc_status, doc_patient, slotID) 
                                     VALUES ('', $user_fullname','', '$user_email', '', '', '' )";
                                      $r = mysqli_query($dbc, $query);

                                      ?>
                                    </form>

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
                          $query = '
				SELECT * FROM user WHERE user_role="Reject"
				';

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
                                      <!-- <li><i class="fa fa-phone"></i> Phone #: </li> -->
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
                                          <option value="Moderator" <?php if ($row["user_role"] == "Moderator") {
                                                                      echo "selected";
                                                                    } ?>>Moderator</option>
                                        <?php
                                        }
                                        ?>

                                        <option value="Monitor" <?php if ($row["user_role"] == "Monitor") {
                                                                  echo "selected";
                                                                } ?>>Monitor</option>
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
            <!-- /page content -->

            <?php
            include_once "footer.php";
            ?>