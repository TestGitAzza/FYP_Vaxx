<?php
include_once "header.php";
?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <style>

            </style>
            <?php
            include_once "sidebar.php";
            include_once "nav.php";
            ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Manage Appointment</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <?php
                        require_once('mysql_connect.php');
                        $mykid = $_GET['mykid'];
                        $id_appt = $_GET['id_appt'];
                        $query = "SELECT * from appointment where mykid='$mykid' AND id_appt='$id_appt'";
                        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Manage Schedule <small>Mykid : <?php echo $row["mykid"]; ?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="alert alert-info  " role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                                        </button>
                                        Manage patient's schedule
                                    </div>
                                    <form action="manage.php?mykid=<?= $_GET['mykid'] ?>&id_appt=<?= $_GET['id_appt'] ?>" method="post">
                                        <div class="item form-group">
                                            <label for="appt_type" class="col-form-label col-md-3 col-sm-3 label-align"> Vaccine Type <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="appt_type" class="form-control" readonly="readonly" type="text" name="appt_type" value="<?php echo $row["appt_type"]; ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="appt_rec" class="col-form-label col-md-3 col-sm-3 label-align"> Recommended Date <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="appt_rec" class="form-control" readonly="readonly" type="text" name="appt_rec" value="<?php echo date_format(new DateTime($row['appt_start']), 'd/m/Y') ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label for="appt_rec" class="col-form-label col-md-3 col-sm-3 label-align"> Date Taken <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="appt_rec" class="form-control" type="date" name="appt_rec" value="<?php echo date_format(new DateTime($row['appt_start']), 'd/m/Y') ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                        <label for="status" class="col-form-label col-md-3 col-sm-3 label-align"> Status <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6">
                                                <select name="stat" class="form-control">
                                                    <option>Completed</option>
                                                    <option>Dismissed</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Remarks
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <textarea class="form-control" rows="3" placeholder="Remarks" name="remark" value="<?= $row['remark'] ?>"></textarea>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button type="submit" name="update" class="btn btn-success">Manage Schedule</button>
                                                <a href="patientprofile.php?mykid=<?= $mykid ?>"><button class="btn btn-primary" type="button">Cancel</button></a>

                                            </div>
                                        </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['update'])) {
        if (empty($errors)) {
            $remark = $_POST['remark'];
            $query = "UPDATE appointment SET appt_start='" . $_POST['appt_rec'] . "',appt_end='" . $_POST['appt_rec'] . "', 
            appt_status='".$_POST['stat']."', doc='Taken at other facility', remark='" . $_POST['remark'] . "'
          WHERE id_appt=$id_appt";
            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    ?>
            <script type="text/javascript">
                function confirmAlert() {
                    alert("Schedule has been updated");
                }
                confirmAlert();
                window.location.href = 'patientprofile.php?mykid=<?= $mykid ?>&id_appt=<?= $id_appt ?>';
            </script>

    <?php
        }
    }
    ?>
    <!-- /page content -->

    <?php
    include_once "footer.php";
    ?>