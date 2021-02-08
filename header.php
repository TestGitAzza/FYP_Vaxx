<?php
session_start();
require_once "authCookieSessionValidate.php";

if (!$isLoggedIn) {
?>
  <script type="text/javascript">
    window.location.href = 'logout.php';
  </script>
<?php
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
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

  <title>Vaxx: Schedule & Tracking System </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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

  <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">
  <!-- Dropzone.js -->
  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


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
    body { 
      background: #272B2B;
      font-family: 'Raleway', 'sanserif';
    }
    .left_col {
      background: #272B2B;
     }
     .nav_title {
       background: #272B2B;
     }
    .zoom {
      transition: all 1s ease-in-out;
      -webkit-transition: all 1s ease-in-out;
      /** Chrome & Safari **/
      -moz-transition: all 1s ease-in-out;
      /** Firefox **/
      -o-transition: all 1s ease-in-out;
      /** Opera **/
    }

    .zoom:hover {
      transform: scale(3) translate(-50px, 50px);
      -webkit-transform: scale(3) translate(-50px, 50px);
      /** Chrome & Safari **/
      -o-transform: scale(3) translate(-50px, 50px);
      /** Opera **/
      -moz-transform: scale(3) translate(-50px, 50px);
      /** Firefox **/
    }

    .image-cropper {
      width: 150px;
      height: 150px;
      position: relative;
      overflow: hidden;
      border-radius: 50%;
      border: 2px solid white;
      background-color: white;
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

    .login_content h2 {
      font: normal 25px Helvetica, Arial, sans-serif;
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