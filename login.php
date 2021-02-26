<style>

</style>
<?php
session_start();

require_once 'mysql_connect.php';

require_once "Auth.php";
require_once "Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "authCookieSessionValidate.php";

if ($isLoggedIn) {
?>
    <script type="text/javascript">
        window.location.href = 'index.php';
    </script>
    <?php
}

if (isset($_POST['login'])) {
    $isAuthenticated = false;

    $username = $_POST["user_name"];
    $password = $_POST["user_password"];

    $user = $auth->getMemberByUsername($username);
    if (password_verify($password, $user[0]["user_password"])) {
        $isAuthenticated = true;
    }

    if ($isAuthenticated) {
        if ($user[0]["user_role"] == "Pending") {
            $message = "Please wait for admin to approve";
        } else if ($user[0]["user_role"] == "Reject") {
            $message = "Your registration has been rejected";
        } else {
            $_SESSION['id'] = $user[0]["id"];
            $_SESSION['uwlspecialid'] = $user[0]["id"];
            $_SESSION['user_name'] = $user[0]["user_name"];
            $_SESSION['user_fullname'] = $user[0]["user_fullname"];
            $_SESSION['user_email'] = $user[0]["user_email"];
            $_SESSION['user_phone'] = $user[0]["user_phone"];
            $_SESSION['user_role'] = $user[0]["user_role"];
            $_SESSION['user_dp'] = $user[0]["user_dp"];
            $_SESSION["member_id"] = $user[0]["id"];

            // Set Auth Cookies if 'Remember Me' checked
            if (!empty($_POST["remember"])) {
                setcookie("member_login", $username, $cookie_expiration_time);

                $random_password = $util->getToken(16);
                setcookie("random_password", $random_password, $cookie_expiration_time);

                $random_selector = $util->getToken(32);
                setcookie("random_selector", $random_selector, $cookie_expiration_time);

                $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
                $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

                $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

                // mark existing token as expired
                $userToken = $auth->getTokenByUsername($username, 0);
                if (!empty($userToken[0]["id"])) {
                    $auth->markAsExpired($userToken[0]["id"]);
                }
                // Insert new token
                $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
            } else {
                $util->clearAuthCookie();
            }
    ?>
            <script type="text/javascript">
                window.location.href = 'index.php';
            </script>
<?php
        }
    } else {
        $message = "Invalid Username / Password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <title> VAXX: System </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">


    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <style>


        h1 {
            font-family: 'Poppins-Regular', sans-serif;
            size: 30px;
            color: black;
        }

        .image-cropper {
            width: 150px;
            height: 150px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            align-items: center;

        }

        .image-cropper__image {
            display: block;
            margin: 0 auto;
            height: 100%;
        }

        #fileContainer {
            overflow: hidden;
            position: relative;
        }

        #fileContainer [type=file] {
            cursor: inherit;
            display: block;
            font-size: 90px;
            filter: alpha(opacity=0);
            min-height: 100%;
            min-width: 100%;
            opacity: 0;
            position: absolute;
            right: 0;
            text-align: right;
            top: 0;

        }

        .login_wrapper {
            right: 0px;
            /* margin: 300px; */
            margin-top: 5%;
            max-width: 40%;
            /* position: relative;  */
        }

        .login_content {
            margin: 0 auto;
            padding: 20px;
            position: center;
            border-radius: 3px;
            text-align: center;
            text-shadow: 0 1px 0 #fff;
            max-width: 630px;
            /* background-image: url('images/bg-08.jpg'); */
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(169,223,191,1), 0 6px 20px 0 rgba(169,223,191,1);
        }

        .login_content h1 {
            font: bold 30px 'Raleway', sans-serif;
            
            letter-spacing: -0.05em;
            line-height: 20px;
            margin: 10px 0 30px;
        }

        .login_content h1:before,
        .login_content h1:after {
            content: "";
            height: 1px;
            /* position: absolute; */
            top: 10px;
            width: 27%;
        }

        .login_content h1:after {
            background: #7e7e7e;
            /* background: linear-gradient(to right, #7e7e7e 0%, white 100%); */
            right: 0;
        }

        .login_content h1:before {
            background: #7e7e7e;
            /* background: linear-gradient(to left, #7e7e7e 0%, white 100%); */
            left: 0;
        }

        .login_content h1:before,
        .login_content h1:after {
            content: "";
            height: 1px;
            /* position: absolute; */
            top: 10px;
            width: 20%;
        }

        .login_content form input[type="text"],
        .login_content form input[type="email"],
        .login_content form input[type="password"] {
            border-radius: 3px;
            /* -ms-box-shadow: 0 1px 0 #000, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            -o-box-shadow: 0 1px 0 #000, 0 -2px 5px rgba(0, 0, 0, 0.08) inset;
            box-shadow: 0 1px 0 #000, 0 -2px 5px rgba(0, 0, 0, 0.08) inset; */
            background-color: #F4F6F7;
            color: #777;
            /*typing color */
            /* margin: 0 0 20px; */
            width: 500px;
        }

        .login_content h1:after {
            background: #7e7e7e;
            background: linear-gradient(to right, #7e7e7e 0%, white 100%);
            right: 0;
        }

        .login_content h1:before {
            background: #7e7e7e;
            background: linear-gradient(to left, #7e7e7e 0%, white 100%);
            left: 0;
        }

        .login_content h2 {
            font: normal 25px 'Raleway', sans-serif;
            color: black;
            letter-spacing: -0.05em;
            line-height: 20px;
            margin: 10px 0 30px;
        }

        .login_content h2:before,
        .login_content h2:after {
            content: "";
            height: 1px;
            position: absolute;
            top: 10px;
            width: 27%;
        }

    </style>
</head>

<body style="background-color: white;" class="login">
    <div>

        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">

            <div class="animate form login_form">
                <div style="text-align:center;padding-top:10px">
                    <!-- make it tilted with photos  -->
                </div>
                <section class="login_content">
                    <form action="login.php#signin" method="post">
                        <h1>Vaxx: Schedule & Tracking System </h1>
                        <br><br><div>
                            <input style="font-family: Raleway, sanserif;" type="text" class="form-control" placeholder="Username" name="user_name" 
                            value="<?php if (isset($_COOKIE["member_login"])) {
                            echo $_COOKIE["member_login"];
                            } ?>" required />
                        </div>
                        <div>
                            <input style="font-family: Raleway, sanserif;" type="password" class="form-control" placeholder="Password" name="user_password" 
                            value="<?php if (isset($_COOKIE["member_password"])) {
                            echo $_COOKIE["member_password"];
                            } ?>" required />
                        </div>
                        <div>
                            <div class="">
                                <label>
                                    <input type="checkbox" class="js-switch" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /> Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="error-message"><?php if (isset($message)) {
                                                        echo $message;
                                                    } ?></div>
                        <div>
                            <input type="submit" class="btn btn-default submit" style="font-weight: bold; font-size: 15px;
                margin: 5px 15px 0 0;
                text-decoration: none;
                float:none; background-color:#6976A8; border-radius:1em; font-family: Raleway, sanserif;" name="login" value="LOGIN">
                            <!-- <a class="btn btn-default submit" href="login.html">Log in</a> -->
                            <!-- <a class="reset_pass" href="forgotpass.php">Lost your password?</a> -->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <h2>Create Account</h2>
                    <form action="login.php#signup" method="post" enctype="multipart/form-data">

                        <div style="text-align:center;">
                            <div>
                                <center>
                                    <div class="image-cropper">

                                        <img id="blah" src="user_img/user.png" class="image-cropper__image" />
                                        <div class="box">
                                        </div>
                                    </div>
                                </center>
                                <div class="buttontop" style="padding-bottom:15px;padding-top:15px">
                                    <label id="fileContainer" class="btn btn-primary btn-block" style="font: normal 18px Helvetica, Arial, sans-serif; font-weight:normal">
                                        Upload Picture
                                        <input type="file" id="fileToUpload" name="fileToUpload" onchange="readURL(this);" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input style="font-family: Raleway, sanserif;" type="text" class="form-control" placeholder="Username" name="user_name" required />
                        </div>
                        <div>
                            <input style="font-family: Raleway, sanserif;" type="text" class="form-control" placeholder="Full name" name="user_fullname" required />
                        </div>
                        <div>
                            <input style="font-family: Raleway, sanserif;" type="email" class="form-control" placeholder="Email" name="user_email" required />
                        </div>
                        <div>
                            <input style="font-family: Raleway, sanserif;" type="text" class="form-control" placeholder="Phone" name="user_phone" data-inputmask="'mask' : '(999) 999-99999'" required>
                        </div>
                        <div>
                            <input style="font-family: Raleway, sanserif;" type="password" class="form-control" placeholder="Password" name="user_password" required />
                        </div>
                        <?php
                        if (isset($_POST['register'])) {
                            $errors = array(); // Initialize error array.
                            if ($_FILES["fileToUpload"]["name"] == "") {
                                $user_dp = "user.png";
                            } else {

                                function generateRandomString($length = 10)
                                {
                                    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                }
                                $dp = generateRandomString();
                                $filename = mysqli_real_escape_string($dbc, $_FILES["fileToUpload"]["name"]);
                                $tmpfilename = mysqli_real_escape_string($dbc, $_FILES["fileToUpload"]["tmp_name"]);
                                $user_dp = basename($dp . $filename);
                                $target_dir = "user_img/";
                                $target_file = $target_dir . $user_dp;
                                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                                move_uploaded_file($tmpfilename, $target_file);
                            }
                            // Check for name
                            if (empty($_POST['user_name'])) {
                                $errors[] = 'You forgot to enter your username.';
                            } else {
                                $user_name = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
                            }

                            // Check for fullname
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
                            // Check for password
                            if (empty($_POST['user_password'])) {
                                $errors[] = 'You forgot to enter your password.';
                            } else {
                                $user_password = mysqli_real_escape_string($dbc, trim($_POST['user_password']));
                            }

                            if (empty($errors)) {

                                $querycemail = "SELECT * FROM user where user_email = '" . $user_email . "'";
                                $querycname = "SELECT * FROM user where user_name = '" . $user_name . "'";
                                $resultemail = mysqli_query($dbc, $querycemail);
                                $resultname = mysqli_query($dbc, $querycname);

                                if (mysqli_num_rows($resultemail) > 0) {
                                    echo "An account is already registered with your email address. Please Login.";
                                } else if (mysqli_num_rows($resultname) > 0) {
                                    echo "An account is already registered with your username. Please Login.";
                                } else {
                                    $hashpass = password_hash($user_password, PASSWORD_DEFAULT);
                                    $query = "INSERT INTO user (user_name,user_fullname,user_email,user_password,user_role,user_phone,user_dp) VALUES ('$user_name','$user_fullname','$user_email','$hashpass','Pending','$user_phone','$user_dp')";
                                    $result = mysqli_query($dbc, $query);


                                    if ($result) {

                        ?>


                                        <script type="text/javascript">
                                            function confirmAlert() {
                                                alert("Please wait for admin to accept");
                                            }
                                            confirmAlert();
                                            window.location.href = 'login.php';
                                        </script>
                        <?php

                                        exit();
                                    } else {
                                        echo '<h1 id="mainhead" >System Error</h1> <p class="error">You could not be registered due to a system error. We apologize for any incovenience.</p>';
                                        echo '<p>' . mysqli_error($conn) . '<br /><br />' . $query . '</p>';
                                        exit();
                                    }
                                }
                                mysqli_close($dbc);
                            } else {

                                echo '<h1 id="mainhead" ">Error!</h1>
                            <p>The following error(s) occurred:<br />';
                                foreach ($errors as $msg) {
                                    echo "- $msg<br />\n";
                                }
                                echo '</p><p>Please try again.</p><p><br /></p>';
                            }
                        }
                        ?>
                        <div>
                            <input type="submit" class="btn btn-default submit" style="font-weight: bold; font-size: 12px;
                margin: 5px 15px 0 0;
                text-decoration: none;
                float:none; background-color:#6976A8; border-radius:1em; font-family: Raleway, sanserif;" name="register" value="SUBMIT">
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p style="color:black;" class="change_link">Already a member ?
                                <a href="#signin" style="color: black;" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>

</html>