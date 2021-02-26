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
                <section class="login_content">

                    <?php
                    include('mysql_connect.php');
                    $error = "";
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .= "<p>Invalid email address please type a valid email address!</p>";
                        } else {
                            $sel_query = "SELECT * FROM `user` WHERE user_email='" . $email . "'";
                            $results = mysqli_query($dbc, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "<p>No user is registered with this email address!</p>";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
                        } else {
                            $expFormat = mktime(
                                date("H"),
                                date("i"),
                                date("s"),
                                date("m"),
                                date("d") + 1,
                                date("Y")
                            );
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(2418 * 2 + $email);
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query(
                                $dbc,
                                "INSERT INTO `user_pw_reset` (`email`, `key`, `expDate`)
VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
                            );

                            $output = '<p>Dear user,</p>';
                            $output .= '<p>Please click on the following link to reset your password.</p>';
                            $output .= '<p>-------------------------------------------------------------</p>';
                            $output .= '<p><a href="http://localhost/adminuwltest/production/resetpass.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">
                            http://localhost/adminuwltest/production/resetpass.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $output .= '<p>-------------------------------------------------------------</p>';
                            $output .= '<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
                            $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
                            $output .= '<p>Thanks,</p>';
                            $output .= '<p>Tapak Operasi UWL</p>';
                            $body = $output;
                            $subject = "Password Recovery - Tapak Operasi UWL";

                            $email_to = $email;
                            $fromserver = "noreply@aduanuwl.com";
                            try {
                                require("PHPMailer/PHPMailerAutoload.php");
                                $mail = new PHPMailer();
                                $mail->isSMTP();
                                $mail->Host = 'localhost';
                                $mail->SMTPAuth = false;
                                $mail->SMTPAutoTLS = false;
                                $mail->Port = 25;
                                // $mail->Host = 'mail.tapakoperasiuwl.com';    // Must be GoDaddy host name
                                // $mail->SMTPAuth = true; 
                                // $mail->Username = 'noreply@tapakoperasiuwl.com';
                                // $mail->Password = 'AdminUWLv2.0';
                                // $mail->SMTPSecure = 'tls';   // ssl will no longer work on GoDaddy CPanel SMTP
                                // $mail->Port = 587;    // Must use port 587 with TLS
                                // $mail->Host = 'localhost';
                                // $mail->SMTPAuth = false;
                                // $mail->SMTPAutoTLS = false; 
                                // $mail->Port = 25; 
                                // $mail->Username = "operation.uwl@gmail.com"; // Enter your email here
                                // $mail->Password = "aduanuwl2020"; //Enter your password here
                                $mail->IsHTML(true);
                                $mail->From = "noreply@aduanuwl.com";
                                $mail->FromName = "Tapak Operasi UWL";
                                $mail->Sender = $fromserver; // indicates ReturnPath header
                                $mail->Subject = $subject;
                                $mail->Body = $body;
                                $mail->AddAddress($email_to);
                                if (!$mail->Send()) {
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                } else {
                                    echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p><br/>
<a href='login.php>Back to home</a>
</div><br /><br /><br />";
                                }
                            } catch (phpmailerException $e) {
                                echo $e->errorMessage(); //Pretty error messages from PHPMailer
                            } catch (Exception $e) {
                                echo $e->getMessage(); //Boring error messages from anything else!
                            }
                        }
                    } else {
                    ?>
                        <form action="" method="post" name="reset">
                            <h1>Forgot Password</h1>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" name="email" required />
                            </div>
                            <div>
                                <input type="submit" class="btn btn-default submit" style="font-size: 12px;
                margin: 5px 15px 0 0;
                text-decoration: none;
                float:none" name="submit" value="Reset Password">
                                <!-- <a class="btn btn-default submit" href="login.html">Log in</a> -->
                                <a class="reset_pass" href="login.php">Remember Now?</a>
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
                    <?php } ?>
                </section>
            </div>

        </div>
    </div>
</body>

</html>