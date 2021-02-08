<?php
session_start();
if (isset($_SESSION['uwlspecialid'])) {
    header('location: index.php');
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

    <title>UWL Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <div style="text-align:center;padding-top:10px">
                    <img src="images/uwllogo.png" width="200px" alt="UWL" />
                </div>
                <section class="login_content"><?php
                                                include('mysql_connect.php');
                                                if (
                                                    isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
                                                    && ($_GET["action"] == "reset") && !isset($_POST["action"])
                                                ) {
                                                    $key = $_GET["key"];
                                                    $email = $_GET["email"];
                                                    $curDate = date("Y-m-d H:i:s");
                                                    $query = mysqli_query(
                                                        $dbc,
                                                        "SELECT * FROM `user_pw_reset` WHERE `key`='" . $key . "' and `email`='" . $email . "';"
                                                    );
                                                    $row = mysqli_num_rows($query);
                                                    if ($row == "") {
                                                        $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="http://localhost/adminuwltest/production/forgotpass.php">
Click here</a> to reset password.</p>';
                                                    } else {
                                                        $row = mysqli_fetch_assoc($query);
                                                        $expDate = $row['expDate'];
                                                        if ($expDate >= $curDate) {
                                                ?>
                                <form action="" method="post" name="update">
                                    <h1>Reset Password</h1>
                                    <input type="hidden" name="action" value="update" />
                                    <div>
                                        <input type="password" name="pass1" class="form-control" placeholder="Enter New Password" required />
                                    </div>
                                    <div>
                                        <input type="password" name="pass2" class="form-control" placeholder="Re-Enter New Password" required />
                                    </div>
                                    <div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                        <input type="submit" class="btn btn-default submit" style="font-size: 12px;
                margin: 5px 15px 0 0;
                text-decoration: none;
                float:none" name="submit" value="Reset Password">
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="separator">

                                        <div class="clearfix"></div>
                                        <br />
                                        <div>
                                            <h1>Underwater World Langkawi</h1>
                                            <h1>Aduan Kerosakan v2.0</h1>
                                        </div>
                                    </div>
                                </form>
                    <?php
                                                        } else {
                                                            $error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
                                                        }
                                                    }
                                                    if ($error != "") {
                                                        echo "<div class='error'>" . $error . "</div><br />";
                                                    }
                                                } // isset email key validate end


                                                if (
                                                    isset($_POST["email"]) && isset($_POST["action"]) &&
                                                    ($_POST["action"] == "update")
                                                ) {
                                                    $error = "";
                                                    $pass1 = mysqli_real_escape_string($dbc, $_POST["pass1"]);
                                                    $pass2 = mysqli_real_escape_string($dbc, $_POST["pass2"]);
                                                    $email = $_POST["email"];
                                                    $curDate = date("Y-m-d H:i:s");
                                                    if ($pass1 != $pass2) {
                                                        $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                                                    }
                                                    if ($error != "") {
                                                        echo "<div class='error'>" . $error . "</div><br />";
                                                    } else {
                                                        $pass1 = md5($pass1);
                                                        mysqli_query(
                                                            $dbc,
                                                            "UPDATE `user` SET `user_password`='" . $pass1 . "', `user_register_date`='" . $curDate . "' 
WHERE `email`='" . $email . "';"
                                                        );

                                                        mysqli_query($dbc, "DELETE FROM `user_pw_reset` WHERE `email`='" . $email . "';");

                                                        echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="http://localhost/adminuwltest/production/login.php">
Click here</a> to Login.</p></div><br />';
                                                    }
                                                }
                    ?>
                </section>
            </div>

        </div>
    </div>
</body>

</html>