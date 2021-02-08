<?php
include_once "header.php";
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php
      require_once('mysql_connect.php');
      include_once "sidebar.php";
      include_once "nav.php";
      ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Register New Patient</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div style="font-weight: bold;" class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="registeruser.php" method="post">
                    <div class="item form-group">
                      <label for="fullname" class="col-form-label col-md-3 col-sm-3 label-align">Full Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="fullname" class="form-control" required="required" type="text" name="fullname">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="gender" class="col-form-label col-md-3 col-sm-3 label-align">Gender *:</label>
                      <div class="col-md-6 col-sm-6">
                        <p>
                          Male:
                          <input type="radio" class="flat" name="gender" id="genderM" value="Male" required />
                          Female:
                          <input type="radio" class="flat" name="gender" id="genderF" value="Female" />
                        </p>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="birthday" class="col-form-label col-md-3 col-sm-3 label-align">Date of Birth<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="birthday" class="form-control" required="required" type="date" name="birthday">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="parents" class="col-form-label col-md-3 col-sm-3 label-align">Mother's Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="parents" class="form-control" type="text" required="required" name="parents">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="mykid" class="col-form-label col-md-3 col-sm-3 label-align"> MyKid <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="mykid" class="form-control" required="required" type="text" name="mykid">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="address"> Address <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="address" name="address" required="required" class="form-control">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="address"> Place of Birth <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6">
                        <input id="placebirth" class="form-control" required="required" type="text" name="placebirth">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Nationality</label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="nationality">
                          <option>Malay</option>
                          <option>Chinese</option>
                          <option>Indian</option>
                          <option>Others</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone"> Phone Number <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6">
                        <input id="phone" class="form-control" type="text" required="required" name="phone">
                      </div>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                       
                        <button class="btn btn-primary" type="submit" values="Submit" name="submit"> Register Patient </button>
                      </div>
                    </div>


                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php

        if (isset($_POST['submit'])) {
          $errors = array(); // Initialize error array.

          if (empty($_POST['fullname'])) {
            $errors[] = '';
          } else {
            $fullname = trim($_POST['fullname']);
          }

          if (empty($_POST['gender'])) {
            $errors[] = '';
          } else {
            $gender = trim($_POST['gender']);
          }

          if (empty($_POST['birthday'])) {
            $errors[] = '';
          } else {
            $birthday = $_POST['birthday'];
          }

          if (empty($_POST['address'])) {
            $errors[] = '';
          } else {
            $address = $_POST['address'];
          }

          if (empty($_POST['parents'])) {
            $errors[] = '';
          } else {
            $parents = $_POST['parents'];
          }

          if (empty($_POST['placebirth'])) {
            $errors[] = '';
          } else {
            $placebirth = $_POST['placebirth'];
          }

          if (empty($_POST['nationality'])) {
            $errors[] = '';
          } else {
            $nationality = $_POST['nationality'];
          }

          if (empty($_POST['phone'])) {
            $errors[] = '';
          } else {
            $phone = $_POST['phone'];
          }

          if (empty($_POST['mykid'])) {
            $errors[] = '';
          } else {
            $mykid = $_POST['mykid'];
          }

          if (empty($errors)) {
            $querycemail = "SELECT * FROM patient where mykid = '" . $mykid . "'";
            $resultemail = mysqli_query($dbc, $querycemail);

            if (mysqli_num_rows($resultemail) > 0) {
              // echo "Mykid has been registered. Please recheck registration";
        ?> <script type='text/javascript'>
                alert('Error! Mykid has been registered before. Please recheck registration');
              </script> <?php
                      } else {
                        $query = "INSERT INTO patient (fullname, gender, birthday, address, parents, mykid, placebirth, nationality, phone) VALUES ('$fullname','$gender','$birthday','$address', '$parents','$mykid', '$placebirth', '$nationality', '$phone')";
                        $result = mysqli_query($dbc, $query);

                        $date = date_create($birthday);
                        $month0 = date_format($date, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month0_1 = date_format($date, "Y-m-d");
                        //end of month 0
                
                        $date = date_create($birthday);
                        $month1 = date_add($date, date_interval_create_from_date_string("1 month"));
                        $month1 = date_format($month1, "Y-m-d");
                
                        //month 2
                        $date = date_create($birthday); //retrieve the dob
                        $month2 = date_add($date, date_interval_create_from_date_string("2 months")); //add the date
                        $month2 = date_format($month2, "Y-m-d"); //display the date 
                
                        $date = date_create($birthday); //retrieve the dob
                        $month2_1 = date_add($date, date_interval_create_from_date_string("2 months")); //add the date
                        $month2_1 = date_format($month2_1, "Y-m-d"); //display the date 
                
                        $date = date_create($birthday); //retrieve the dob
                        $month2_2 = date_add($date, date_interval_create_from_date_string("2 months")); //add the date
                        $month2_2 = date_format($month2_2, "Y-m-d"); //display the date 
                        //end month2
                
                        //month 3 
                        $date = date_create($birthday);
                        $month3 = date_add($date, date_interval_create_from_date_string("3 months"));
                        $month3 = date_format($month3, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month3_1 = date_add($date, date_interval_create_from_date_string("3 months"));
                        $month3_1 = date_format($month3_1, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month3_2 = date_add($date, date_interval_create_from_date_string("3 months"));
                        $month3_2 = date_format($month3_2, "Y-m-d");
                        //end of month3
                
                        //month5
                        $date = date_create($birthday);
                        $month5 = date_add($date, date_interval_create_from_date_string("5 months"));
                        $month5 = date_format($month5, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month5_1 = date_add($date, date_interval_create_from_date_string("5 months"));
                        $month5_1 = date_format($month5_1, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month5_2 = date_add($date, date_interval_create_from_date_string("5 months"));
                        $month5_2 = date_format($month5_2, "Y-m-d");
                        //end of month 5
                
                        //month6
                        $date = date_create($birthday);
                        $month6 = date_add($date, date_interval_create_from_date_string("6 months"));
                        $month6 = date_format($month6, "Y-m-d");
                
                
                        $date = date_create($birthday);
                        $month6_1 = date_add($date, date_interval_create_from_date_string("6 months"));
                        $month6_1 = date_format($month6_1, "Y-m-d");
                        //end of  month6
                
                        //month10
                        $date = date_create($birthday);
                        $month10 = date_add($date, date_interval_create_from_date_string("10 months"));
                        $month10 = date_format($month10, "Y-m-d");
                        //end of month10
                
                        //month12
                        $date = date_create($birthday);
                        $month12 = date_add($date, date_interval_create_from_date_string("12 months"));
                        $month12 = date_format($month12, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month12_1 = date_add($date, date_interval_create_from_date_string("12 months"));
                        $month12_1 = date_format($month12_1, "Y-m-d");
                        //end of month12
                
                        //month18
                        $date = date_create($birthday);
                        $month18 = date_add($date, date_interval_create_from_date_string("18 months"));
                        $month18 = date_format($month18, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month18_1 = date_add($date, date_interval_create_from_date_string("18 months"));
                        $month18_1 = date_format($month18_1, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month18_2 = date_add($date, date_interval_create_from_date_string("18 months"));
                        $month18_2 = date_format($month18_2, "Y-m-d");
                
                        $date = date_create($birthday);
                        $month18_3 = date_add($date, date_interval_create_from_date_string("18 months"));
                        $month18_3 = date_format($month18_3, "Y-m-d");
                        //end month18
                
                        $date = date_create($birthday);
                        $years4 = date_add($date, date_interval_create_from_date_string("4 years"));
                        $years4 = date_format($years4, "Y-m-d");
                
                        //years 7
                        $date = date_create($birthday);
                        $years7 = date_add($date, date_interval_create_from_date_string("7 years"));
                        $years7 = date_format($years7, "Y-m-d");
                
                        $date = date_create($birthday);
                        $years7_1 = date_add($date, date_interval_create_from_date_string("7 years"));
                        $years7_1 = date_format($years7_1, "Y-m-d");
                
                        $date = date_create($birthday);
                        $years7_2 = date_add($date, date_interval_create_from_date_string("7 years"));
                        $years7_2 = date_format($years7_2, "Y-m-d");
                        //end of years7
                
                        $date = date_create($birthday);
                        $years13 = date_add($date, date_interval_create_from_date_string("13 years"));
                        $years13 = date_format($years13, "Y-m-d");
                
                        $date = date_create($birthday);
                        $years15 = date_add($date, date_interval_create_from_date_string("15 years"));
                        $years15 = date_format($years15, "Y-m-d");
                
                        $typeArray = array(
                          "Bacillus Calmette–Guérin (BCG) [1st Dose]", "Hepatitis B (HepB) [1st Dose]", "Hepatitis B (HepB) [2nd Dose]", "Diptheria, Tetanus, accellular Pertussis (DTaP) [1st Dose]", "Haemophilus influenzae b (Hib) [1st Dose]", "Inactivated Poliovirus (IPV) [1st Dose]",
                          "Diptheria, Tetanus, accellular Pertussis (DTaP) [2nd Dose]", "Haemophilus influenzae b (Hib) [2nd Dose]", "Inactivated Poliovirus (IPV) [2nd Dose]",
                          "Diptheria, Tetanus, accellular Pertussis (DTP) [3rd Dose]", "Haemophilus influenzae b (Hib) [3rd Dose]", "Inactivated Poliovirus (IPV) [3rd Dose]",
                          "Hepatitis B (HepB) [3rd Dose]", "Measles (Sabah only)",
                          "Japanese Encephalitis (JE) (Sarawak only)", "Mumps, Measles, Rubella (MMR) [1st Dose]", "Japanese Encephalitis (JE) (Sarawak only) [2nd Dose]",
                          "Diptheria, Tetanus, accellular Pertussis (DTP) [4th Dose]", "Haemophilus influenzae b (Hib) [4th Dose]", "Inactivated Poliovirus (IPV) [4th Dose]", " Japanese Encephalitis (Sarawak only) [3rd Dose]",
                          "Japanese Encephalitis (Sarawak only) [4th Dose]", "BCG (option only if no scar found)", "Diptheria, Tetanus  (DT booster) [1st Dose]", "Mumps, Measles, Rubella (MMR) [2nd Dose]",
                          "Human papillomavirus (HPV) with 3 doses within 6 months (2nd dose 1 month after 1st dose, 3rd dose 6 months after 1st dose)",
                          "Tetanus (TT)"
                        );
                        $typecount = count($typeArray);
                
                        $typeDate = array(
                          $month0, $month0_1, $month1, $month2, $month2_1, $month2_2, $month3, $month3_1, $month3_2, $month5, $month5_1,
                          $month5_2, $month6, $month6_1, $month10, $month12, $month12_1, $month18, $month18_1, $month18_2, $month18_2,
                          $years4, $years7, $years7_1, $years7_2, $years13, $years15
                        );

                        $typevac = array('bcg','hepB','hepB','dtap','hib','ipv',
                        'dtap', 'hib','ipv',
                        'dtap','hib','ipv',
                        'hepB','measles',
                        'je','mmr','je',
                        'dtap', 'hib','ipv','je',
                        'je','bcg', 'dt','mmr',
                        'hpv', 'tt');
                
                
                        $patientid = mysqli_insert_id($dbc);
                        $q = "insert into schedule (sch_patientID, patientName, birthday, mykid, month_0, month0_1, month_1, month_2, month2_1, month2_2, month_3, month3_1, month3_2, month_5, month5_1, month5_2, month_6, month6_1, month_10, month_12, month12_1, month_18, month18_1, month18_2, month18_3, years_4, years_7, years7_1, years7_2, years_13, years_15) 
                       VALUES ('$patientid','$fullname','$birthday','$mykid', '$month0','$month0_1','$month1', '$month2', '$month2_1', '$month2_2', '$month3', '$month3_1', '$month3_2', '$month5', '$month5_1', '$month5_2', '$month6', '$month6_1', '$month10', '$month12', '$month12_1', '$month18', '$month18_1', '$month18_2', '$month18_3', '$years4', '$years7', '$years7_1', '$years7_2', '$years13', '$years15' )";
                        $r = mysqli_query($dbc, $q);

                        $schedID = mysqli_insert_id($dbc);
                        for ($i = 0; $i < $typecount; $i++) {
                          $qappt = "insert into appointment(appt_type, vtype, mykid, patientName, appt_start, appt_end, appt_status, appt_scheduleID, doc,doc_name, remark) 
                              VALUES ('$typeArray[$i]','$typevac[$i]','$mykid','$fullname', '$typeDate[$i]','$typeDate[$i]', 'Not complete', '$patientid', '-' ,'-', '-')";
                          $n = mysqli_query($dbc, $qappt);
                        }
                
                
                      ?>
                
                        <script type="text/javascript">
                          function confirmAlert() {
                            alert("Patient has been registered. Go to schedule..");
                          }
                          confirmAlert();
                          window.location.href = 'newschedule.php?mykid=<?= $mykid ?>';
                        </script>
                      <?php
                
                        mysqli_close($dbc);
                      //}
                        
                      }
                    }
                  }
?>

                        

        <?php
        include_once "footer.php";
        ?>