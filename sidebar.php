<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <br/><a href="index.php" class="site_title"><i class="fa fa-hospital-o"></i> <span><b> VAXX</b></span></a>
      <h6> Schedule & Tracking System </h6>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <!--<div class="profile_pic">
        <img src="user_img/<?=$_SESSION['user_dp']?>" width="15" height="30" class="img-circle profile_img">
      </div> -->
      <div class="profile_info">
        <span>User:</span>
        <br><br/><h2><?= $_SESSION['user_fullname'] ?></h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
          </li>
          <?php
          if ($_SESSION['user_role'] == "Superadmin") {
          ?>
            <li><a href="userapproval.php"><i class="fa fa-user"></i> Users Approval <span class="fa fa-chevron-down"></span></a>
              
            </li>
             
          <?php
          }
          ?>
          
          <!-- Appointment -->

          <?php
              if (($_SESSION['user_role'] == "Admin") || ($_SESSION['user_role'] == "Doctor")) {
              ?>
          <li><a><i class="fa fa-th-list"></i> Appointment <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <?php
              if ($_SESSION['user_role'] == "Admin") {
              ?>

                <!-- <li><a href="newapptment.php">Add new appointment</a></li> -->
                <li><a href="reportappointment.php">All appointment</a></li>
              <li><a href="reportsched.php">Scheduled appointment</a></li>
              <li><a href="reportcomplete.php">Completed appointment</a></li>
              
              <?php
              }
              ?>
              <?php
              if ($_SESSION['user_role'] == "Doctor") {
              ?>
              <li><a href="listappment_sch.php">Scheduled appointment</a></li>
              <li><a href="reportcomplete_doc.php">Completed appointment</a></li>
              
              <?php
              }
              ?>
            </ul>
          </li>      
          <?php
              }
              ?>
          <!-- end of appointment  -->

          <?php
              if (($_SESSION['user_role'] == "Admin") || ($_SESSION['user_role'] == "Doctor")) {
              ?>
          <li><a><i class="fa fa-user"></i> Patients <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <?php
              if ($_SESSION['user_role'] == "Admin") {
              ?>
                <li><a href="registeruser.php">Register New Patient</a></li>
                <li><a href="listpatients.php">List of Patients</a></li>
              <?php
              }
              ?>
              <?php
              if ($_SESSION['user_role'] == "Doctor") {
              ?>
              <li><a href="listpatients_doc.php">List Patients</a></li>
              <?php
              }
              ?>
            </ul>
          </li>
          <?php
              }
              ?>


          <?php
          if ($_SESSION['user_role'] == "Admin") {
          ?>
            <li><a><i class="fa fa-user"></i> Doctors <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="listdoctors.php">List of Doctors</a></li>
              </ul>
            </li>
           
            
          <?php
          }
          ?>

          
        </ul>
      </div>

    </div>
  </div>
</div>