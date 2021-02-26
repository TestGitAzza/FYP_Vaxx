<?php
include_once "header.php";
include_once "mysql_connect.php";
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
              <h3>Your Profile</h3>
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
                  <h2>Profile <small>Update your profile here</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_dp">Profile Picture <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <center>
                          <div class="image-cropper">

                            <img id="blah" src="user_img/<?=$_SESSION['user_dp']?>" class="image-cropper__image" />
                            <div class="box">
                            </div>
                          </div>
                        </center>
                        <div class="buttontop">
                          <label id="fileContainer" class="btn btn-primary btn-block" style="font: normal 18px Helvetica, Arial, sans-serif; font-weight:normal">
                            Change Picture
                            <input type="file" id="fileToUpload" name="fileToUpload" onchange="readURL(this);" />
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_name">Username <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="user_name" name="user_name" required="required" readonly class="form-control" value="<?= $_SESSION['user_name'] ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_fullname">Full Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="user_fullname" name="user_fullname" required="required" class="form-control" value="<?= $_SESSION['user_fullname'] ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="user_email" name="user_email" required="required" class="form-control" value="<?= $_SESSION['user_email'] ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_phone">Phone <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="user_phone" name="user_phone" required="required" class="form-control" data-inputmask="'mask' : '(999) 999-99999'" value="<?= $_SESSION['user_phone'] ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_role">Role <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="user_role" name="user_role" required="required" readonly class="form-control" value="<?= $_SESSION['user_role'] ?>">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div><?php
                            if (isset($_POST['update'])) {

                              if ($_FILES["fileToUpload"]["name"] == "") {
                                $user_dp = $_POST["user_dp"];
                              } else {

                                function generateRandomString($length = 10)
                                {
                                  return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                }
                                $dp = generateRandomString();
                                $filename = mysqli_real_escape_string($dbc, $_FILES["fileToUpload"]["name"]);
                                $tmpfilename = mysqli_real_escape_string($dbc, $_FILES["fileToUpload"]["tmp_name"]);
                                $user_dp = basename($dp.$filename);
                                $target_dir = "user_img/";
                                $target_file = $target_dir . $user_dp;
                                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                                move_uploaded_file($tmpfilename, $target_file);
                              }
                              // Check for full name
                              if (empty($_POST['user_fullname'])) {
                                $errors[] = 'You forgot to enter your full name.';
                              } else {
                                $user_fullname = mysqli_real_escape_string($dbc, trim($_POST['user_fullname']));
                              }

                              // Check for email
                              if (!empty(!filter_var(($_POST['user_email']), FILTER_VALIDATE_EMAIL))) {
                                $errors[] = 'You forgot to enter your email.';
                              } else {
                                $user_email = mysqli_real_escape_string($dbc, trim($_POST['user_email']));
                              }

                              // Check for phone number
                              if (empty($_POST['user_phone'])) {
                                $errors[] = 'You forgot to enter your phone number.';
                              } else {
                                function clean($string)
                                {
                                  $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
                                  $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

                                  return preg_replace('/-+/', '', $string); // Replaces multiple hyphens with single one.
                                }
                                $user_phone = mysqli_real_escape_string($dbc, trim(clean($_POST['user_phone'])));
                              }

                              if (empty($errors)) {
                                $id = $_POST['id'];
                                $query = "UPDATE user SET user_fullname='$user_fullname', user_email='$user_email', user_phone='$user_phone', user_dp='$user_dp' WHERE id=$id";
                                $result = mysqli_query($dbc, $query);
                                if ($result) {
                                  $_SESSION['user_email'] = $user_email;
                                  $_SESSION['user_fullname'] = $user_fullname;
                                  $_SESSION['user_phone'] = $user_phone;
                                  $_SESSION['user_dp'] = $user_dp;
                            ?>
                              <script>
                                function confirmAlert() {
                                  alert("Your Profile has been updated.");
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

                                echo '<h1>Error!</h1>
   <p>The following error(s) occurred:<br />';
                                foreach ($errors as $msg) {
                                  echo "- $msg<br />\n";
                                }
                                echo '</p><p>Please try again.</p><p><br /></p>';
                              }
                            }
                        ?></div>
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
                        <input type="hidden" name="user_dp" value="<?= $_SESSION['user_dp'] ?>" />
                        <button type="submit" class="btn btn-success" name="update">Update</button>
                        <a href="#userpass.php" class="btn btn-info">Reset Password</a>
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