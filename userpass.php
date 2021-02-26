<?php
include_once "header.php";
require_once 'mysql_connect.php';
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
                            <h3>Reset Password</h3>
                        </div>
                        <!-- 
            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div> -->
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Reset Password <small>Reset your password here.</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="recent_password">Recent Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="recent_password" name="recent_password" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pass1">Enter New Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="pass1" name="pass1" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pass2">Re-Enter New Password <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="pass2" name="pass2" required="required" class="form-control">
                                            </div>
                                        </div>
                                            <div class="item form-group"><?php
                                                    if (isset($_POST['change'])) {

                                                        if (empty($_POST['recent_password'])) {
                                                            $errors[] = 'You forgot to enter your recent password.';
                                                        } else {
                                                            $recent_password = trim($_POST['recent_password']);
                                                            $recent_password = md5(mysqli_real_escape_string($dbc,$recent_password));
                                                        }
                                                        $id = $_POST['id'];
                                                        include "config.php";
                                                        $result = $db->prepare("SELECT * FROM user WHERE id=? AND user_password=? ");
                                                        $result->bindParam(1, $id);
                                                        $result->bindParam(2, $recent_password);
                                                        $result->execute();
                                                        $row = $result->fetch();
                                                        $userpassword = $row['user_password'];
                                                        if (password_verify($recent_password, $userpassword)) {
                                                            echo "<p>You've entered a wrong recent password.</p>";
                                                            $errors[] = '';
                                                        }
                                                        if (!empty($_POST['pass1'])) {
                                                            if ($_POST['pass1'] != $_POST['pass2']) {
                                                                echo "<p>Your password is not match. Please try again.</p>";
                                                                $errors[] = '';
                                                            } else {
                                                                $pass = trim($_POST['pass1']);
                                                                $pass = password_hash(mysqli_real_escape_string($dbc,$pass), PASSWORD_DEFAULT);
                                                            }
                                                        } else {
                                                            $errors[] = 'You forgot to enter your NEW PASSWORD.';
                                                        }

                                                        if (empty($errors)) {
                                                            include_once "mysql_connect.php";
                                                            $query = "UPDATE user SET user_password='$pass' WHERE id=$id";
                                                            $result = mysqli_query($dbc, $query);
                                                            if ($result) {
                                                    ?>
                                                            <script>
                                                                function confirmAlert() {
                                                                    alert("Your password has been updated.");
                                                                }
                                                                confirmAlert();
                                                            </script>
                                                <?php
                                                                echo "<meta http-equiv='refresh' content='0;url=userprofile.php'>";

                                                                exit();
                                                            } else {
                                                                echo '<h1>System Error</h1>
      <p>You could not be registered due to a system error. We apologize for any incovenience.</p>';
                                                                echo '<p>' . mysqli_error($dbc) . '<br /><br />' . $query . '</p>';
                                                                exit();
                                                            }

                                                            mysqli_close($dbc);
                                                        } else {
                                                        }
                                                    }
                                                ?></div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
                                                <button type="submit" class="btn btn-success" name="change">Reset</button>
                                            </div>
                                        </div>

                                    </form>
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