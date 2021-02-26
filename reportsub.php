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
              <h3>Report Submission</h3>
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
                  <h2>Report Form <small>please fill all the details</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="reportsub.php" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="rep_fullname">Full Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="rep_fullname" name="rep_fullname" required="required" class="form-control" value="<?php if (isset($_POST['user_fullname'])) {echo $_POST['rep_fullname'];} else {echo $_SESSION['user_fullname'];}?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="rep_email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="rep_email" name="rep_email" required="required" class="form-control" value="<?php if (isset($_POST['rep_email'])) {echo $_POST['rep_email'];} else {echo $_SESSION['user_email'];}?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="rep_department">Department <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="rep_department" name="rep_department" required="required" class="form-control" value="<?php if (isset($_POST['rep_department'])) {echo $_POST['rep_department'];}?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="rep_area">Area <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="rep_area" name="rep_area" required="required" class="form-control" value="<?php if (isset($_POST['rep_area'])) {echo $_POST['rep_area'];}?>">
                      </div>
                    </div>
                      <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="rep_issue">Issue <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea class="form-control" rows="3" placeholder="Type your issue here..." name="rep_issue"></textarea>
                        </div>
                      </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="rep_upload">Upload(Photo Only) <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="file" id="rep_upload" name="rep_upload" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                    <div></div><?php
if (isset($_POST['submit'])) {

  include_once "mysql_connect.php";
    $errors = array();
    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
    $dp = generateRandomString();
    $filename = mysqli_real_escape_string($dbc, $_FILES["rep_upload"]["name"]);
    $tmpfilename = mysqli_real_escape_string($dbc, $_FILES["rep_upload"]["tmp_name"]);
    $target_dir = "rep_img/";
    $target_file = $target_dir . basename($dp . $filename);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    move_uploaded_file($tmpfilename, $target_file);

    if (empty($_POST['rep_fullname'])) {
        $errors[] = 'You forgot to enter your full name.';
    } else {
        $rep_fullname = mysqli_real_escape_string($dbc,trim($_POST['rep_fullname']));
    }

    if (!empty(!filter_var(($_POST['rep_email']), FILTER_VALIDATE_EMAIL))) {
        $errors[] = 'You forgot to enter your email.';
    } else {
        $rep_email = trim($_POST['rep_email']);
    }

    if (empty($_POST['rep_department'])) {
        $errors[] = 'You forgot to enter your department.';
    } else {
        $rep_department = mysqli_real_escape_string($dbc,trim($_POST['rep_department']));
    }

    if (empty($_POST['rep_area'])) {
        $errors[] = 'You forgot to enter the report area.';
    } else {
        $rep_area = mysqli_real_escape_string($dbc,trim($_POST['rep_area']));
    }

    if (empty($_POST['rep_issue'])) {
        $errors[] = 'You forgot to enter the report issue.';
    } else {
        $rep_issue = mysqli_real_escape_string($dbc,trim($_POST['rep_issue']));
    }

    if (empty($errors)) {
        $rep_uid = $_POST['rep_uid'];
        $rep_ticketid = 'UWLR'.$_POST['rep_uid'].date("ymdHis");
        $query = "INSERT INTO report (rep_fullname, rep_email, rep_department, rep_area , rep_issue , rep_upload , rep_uid ,  rep_ticketid, rep_status, rep_comment, rep_assign_to)
  VALUES ('" . $rep_fullname . "','" . $rep_email . "','" . $rep_department . "','" . $rep_area . "','" . $rep_issue . "','" . basename($dp . $filename) . "','" . $rep_uid . "','" . $rep_ticketid . "','Pending','','')";
        $result = mysqli_query($dbc, $query);
        if ($result) {
          ?>
          <script>
          function confirmAlert() {
            alert("Your report has been submitted and will be review soon.");
          }
          confirmAlert();
          </script>
          <?php
            echo "<meta http-equiv='refresh' content='0;url=reportsub.php'>";

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
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <input type="hidden" name="rep_uid" value="<?=$_SESSION['id']?>"/>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
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