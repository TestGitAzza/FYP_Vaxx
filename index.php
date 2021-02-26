<?php
include_once "header.php";
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php
      include_once "sidebar.php";
      include_once "nav.php";
      include "mysql_connect.php";
      ?>
      <!-- FullCalendar -->
      <!-- <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
      <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print"> -->
      <style>
        a {
          color: black;
        }

        .x_title {
          border-bottom: 2px solid #808B96;
          padding: 1px 5px 6px;
          margin-bottom: 10px;
        }

        .media .date {
          background: #d24040;
          width: 52px;
          margin-right: 10px;
          border-radius: 10px;
          padding: 5px;
        }

        ul.count2 {
          width: 100%;
          margin-left: 1px;
          border: 1px solid #7e7e7e;
          border-left: 0;
          border-right: 0;
          padding: 10px 0;
          display: inherit;
        }
      </style>

      <body class="nav-md">
        <div class="container body">
          <div class="main_container">

            <!-- page content -->
            <div style="background-color: #f1f1f1;" class="right_col" role="main">
              <!-- numbers !-->
              <?php
              $resultpatient = mysqli_query($dbc, "SELECT count(*) as total from patient");
              $totalpatient = mysqli_fetch_assoc($resultpatient);
              $resultscheduled = mysqli_query($dbc, "SELECT count(*) as total from appointment where appt_status = 'Scheduled' ");
              $totalscheduled = mysqli_fetch_assoc($resultscheduled);
              $resultcompleted = mysqli_query($dbc, "SELECT count(*) as total from appointment where appt_status = 'Completed' ");
              $totalcompleted = mysqli_fetch_assoc($resultcompleted);
              $resultdoctor = mysqli_query($dbc, "SELECT count(*) as total from user where user_role = 'Doctor' ");
              $totaldoctor = mysqli_fetch_assoc($resultdoctor);
              $appt = mysqli_query($dbc, "SELECT count(*) as total from appointment");
              $totalappt = mysqli_fetch_assoc($appt);
              $user = mysqli_query($dbc, "SELECT count(*) as total from user");
              $totaluser = mysqli_fetch_assoc($user);
              ?>
              <div class="row" style="display: inline-block;">
                <div class="tile_count">
                  <div class=" top_tiles" style="margin: 10px 0;">

                    <div class="col-md-2 col-sm-2  tile_stats_count">
                      <span><i class="fa fa-user"></i> Total Patient</span>
                      <h2><?= $totalpatient['total'] ?></h2>
                    </div>
                    <div class="col-md-2 col-sm-2  tile_stats_count">
                      <span><i class="fa fa-th-list"></i> Total Scheduled</span>
                      <h2><?= $totalscheduled['total'] ?></h2>
                    </div>
                    <div class="col-md-2 col-sm-2  tile_stats_count">
                      <span><i class=" fa fa-check-square"></i> Completed</span>
                      <h2><?= $totalcompleted['total'] ?></h2>
                    </div>
                    <div class="col-md-2 col-sm-2  tile_stats_count">
                      <span><i class="fa fa-user"></i> Total Doctor</span>
                      <h2><?= $totaldoctor['total'] ?></h2>
                    </div>
                    <div class="col-md-2 col-sm-2  tile_stats_count">
                      <span><i class="fa fa-user"></i> Total User</span>
                      <h2><?= $totaluser['total'] ?></h2>
                    </div>

                    <div class="col-md-2 col-sm-2  tile_stats_count">
                      <span><i class=" fa fa-align-justify"></i> Appointment</span>
                      <h2><?= $totalappt['total'] ?></h2>
                    </div>


                  </div>
                </div>
                <!-- end of number !-->

                <div class="">
                  <div class="row">

                    <div class="col-md-3   widget widget_tally_box">
                      <div style="background-color: #FFE082 ;" class="x_panel fixed_height_320">
                        <div class="x_content">
                          <h3 class="name">Today's Appointment</h3>
                          <?php
                          $today = date("Y-m-d");
                          $scheduledtoday =  mysqli_query($dbc, "SELECT count(*) as total from appointment where appt_status='Scheduled' and date(appt_start)='$today'");
                          $rscheduledtoday = mysqli_fetch_assoc($scheduledtoday);


                          $completedtoday = mysqli_query($dbc, "SELECT count(*) as total from appointment where appt_status='Completed' and date(appt_start)='$today'");
                          $rcompletedtoday = mysqli_fetch_assoc(($completedtoday));
                          ?>
                          <div class="flex">
                            <ul class="list-inline count2">
                              <li>
                                <h3><?= $rscheduledtoday['total'] ?></h3>
                                <span class="blue"><b>Scheduled</b></span>
                              </li>
                              <li></li>
                              <li>
                                <h3><?= $rcompletedtoday['total'] ?></h3>
                                <span class="green"><b>Completed</b></span>
                              </li>
                            </ul>
                          </div>
                          <p> <a href="todayappt.php" ><button type="button" class="btn btn-success">View All</button></a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="x_panel fixed_height_320">
                        <div class="x_title">
                          <h2>Urgent Reminders <small>Missed Appointment</small></h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                        <div class="tile_count">
                        <div class="col-md-6  tile_stats_count">
                          <?php
                          require_once('mysql_connect.php');
                          $today = date("Y-m-d");
                          $query =  "SELECT * FROM appointment where appt_status='Not Complete' and appt_start <= '$today' LIMIT 4";
                          $result = mysqli_query($dbc, $query);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <article class="media event">
                              <a href="listreports.php?mykid=<?= $row['mykid'] ?>" class="pull-left date">
                                <p class="month"> <?= date_format(new DateTime($row['appt_start']), 'M') ?></p>
                                <p class="day"><?= date_format(new DateTime($row['appt_start']), 'd') ?></p>
                              </a>
                              <div class="media-body">
                                <a class="title" href="listreports.php?mykid=<?= $row['mykid'] ?>"><?= $row['id_appt'] ?></a>
                                <p><?= $row['patientName'] ?></p>
                                <p><?=$row['appt_status']?></p>
                              </div>
                            </article><?php
                                    }
                                      ?>
                        </div>
                        <div class="col-md-6 tile_stats_count">
                        <?php
                          require_once('mysql_connect.php');
                          $today = date("Y-m-d");
                          $query =  "SELECT * FROM appointment where appt_status='Scheduled' and appt_start <= '$today' LIMIT 4";
                          $result = mysqli_query($dbc, $query);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <article class="media event">
                              <a href="listreports.php?mykid=<?= $row['mykid'] ?>" class="pull-left date">
                                <p class="month"> <?= date_format(new DateTime($row['appt_start']), 'M') ?></p>
                                <p class="day"><?= date_format(new DateTime($row['appt_start']), 'd') ?></p>
                              </a>
                              <div class="media-body">
                                <a class="title" href="listreports.php?mykid=<?= $row['mykid'] ?>"><?= $row['id_appt'] ?></a>
                                <p><?= $row['patientName'] ?></p>
                                <p><?=$row['appt_status']?></p>
                              </div>
                            </article><?php
                                    }
                                      ?>
                        </div>
                        </div>

                                  </div>
                      </div>
                    </div>

                    <div class="col-md-3   widget widget_tally_box">
                      <div style="background-color: #d0ece7;" class="x_panel fixed_height_320">
                        <div class="x_content">
                          <h3 class="name">Scheduled Doctor</h3>
                          <?php
                          $today = date("Y-m-d");
                          $scheduledtoday =  mysqli_query($dbc, "SELECT count(*) as total from appointment where doc != 0 and date(appt_start)='$today'");
                          $rscheduledtoday = mysqli_fetch_assoc($scheduledtoday);

                          ?>
                          <div class="flex">
                            <ul class="list-inline count2">
                              <li></li>
                              <li style="text-align: center;">
                                <h3><?= $rscheduledtoday['total'] ?></h3>
                              </li>
                              <li>

                              </li>
                            </ul>
                          </div>
                          <?php $query =  "SELECT * FROM appointment where doc != 0 and date(appt_start)='$today' LIMIT 3";
                          $result = mysqli_query($dbc, $query);
                          while ($row = mysqli_fetch_array($result)) {
                          ?><p><i class="fa fa-user"> </i> Doctor <?= $row['doc_name'] ?></p>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>

                    <!-- start latest registered  -->
                    <div class="col-md-6">

                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Tomorrow's Incomplete Schedule Appointment</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li>
                            </li>
                            <li>
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <ul class="list-unstyled msg_list">

                            <?php
                            $today = date('Y-m-d', strtotime("+1 day"));
                            $query = "SELECT * FROM appointment WHERE appt_status='Not Complete' and date(appt_start) ='$today' LIMIT 6";
                            $result = mysqli_query($dbc, $query);

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <li a href="listreports.php?mykid=<?= $row['mykid'] ?>" style="background-color: #d24040;">
                                <a class="title" href="listreports.php?mykid=<?= $row['mykid'] ?>">
                                  <span style="font-weight: bold;">
                                    <?= $row['patientName'] ?>
                                  </span><br>
                                  <span class="time">
                                    <?= $row['appt_status'] ?>
                                  </span>
                                  </span>

                                  <span class="message">
                                    Appointment Type: <br><?= $row['appt_type'] ?>
                                  </span>

                                </a>
                              </li>
                            <?php
                            }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2> Tomoorow Scheduled Appointment Upcoming</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li>
                            </li>
                            <li>
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <ul class="list-unstyled msg_list">

                            <?php
                            $today = date('Y-m-d', strtotime("+1 day"));
                            $query = "SELECT * FROM appointment WHERE appt_status='Scheduled' and date(appt_start)='$today' ORDER BY appt_start ASC LIMIT 6";
                            $result = mysqli_query($dbc, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                              <li style="background-color: #D0ECE7;">
                                <a>
                                  <span style="font-weight: bold;">
                                    Time: <?php echo date_format(new DateTime($row['appt_start']), 'd/m/Y  H:i:s') ?>
                                  </span><br>
                                  <span class="time">
                                    <?= $row['appt_status'] ?>
                                  </span>
                                  </span>
                                  <span class="mykid">
                                    Patient: <?= $row['mykid'] ?>
                                  </span>
                                  <span class="message">
                                    Appointment Type: <br><?= $row['appt_type'] ?>
                                  </span>

                                </a>
                              </li>
                            <?php
                            }
                            ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /page content -->


              </div>
            </div>
          </div>



          <!-- jQuery -->
          <script src="../vendors/jquery/dist/jquery.min.js"></script>
          <!-- Bootstrap -->
          <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
          <!-- FastClick -->
          <script src="../vendors/fastclick/lib/fastclick.js"></script>
          <!-- NProgress -->
          <script src="../vendors/nprogress/nprogress.js"></script>
          <!-- FullCalendar -->
          <script src="../vendors/moment/min/moment.min.js"></script>
          <script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>


          <!-- NProgress -->
          <script src="../vendors/nprogress/nprogress.js"></script>
          <!-- Chart.js -->
          <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
          <!-- jQuery Sparklines -->
          <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
          <!-- Flot -->
          <script src="../vendors/Flot/jquery.flot.js"></script>
          <script src="../vendors/Flot/jquery.flot.pie.js"></script>
          <script src="../vendors/Flot/jquery.flot.time.js"></script>
          <script src="../vendors/Flot/jquery.flot.stack.js"></script>
          <script src="../vendors/Flot/jquery.flot.resize.js"></script>
          <!-- Flot plugins -->
          <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
          <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
          <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
          <!-- DateJS -->
          <script src="../vendors/DateJS/build/date.js"></script>
          <!-- bootstrap-daterangepicker -->
          <script src="../vendors/moment/min/moment.min.js"></script>
          <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
          <script>
            function init_chart_doughnut2() {

              if (typeof(Chart) === 'undefined') {
                return;
              }

              console.log('init_chart_doughnut');

              if ($('.canvasDoughnut2').length) {

                var chart_doughnut_settings = {
                  type: 'doughnut',
                  tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                  data: {
                    labels: [
                      "Ayam",
                      "Dolphin",
                      "Anjing",
                      "Ikan",
                      "Itik"
                    ],
                    datasets: [{
                      data: [50, 10, 30, 2, 30],
                      backgroundColor: [
                        "#BDC3C7",
                        "#9B59B6",
                        "#E74C3C",
                        "#26B99A",
                        "#3498DB"
                      ],
                      hoverBackgroundColor: [
                        "#CFD4D8",
                        "#B370CF",
                        "#E95E4F",
                        "#36CAAB",
                        "#49A9EA"
                      ]
                    }]
                  },
                  options: {
                    legend: false,
                    responsive: false
                  }
                }

                $('.canvasDoughnut2').each(function() {

                  var chart_element = $(this);
                  var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

                });

              }

            }
            init_chart_doughnut2();
          </script>
          <script>
            /* SPARKLINES */

            function init_sparklines2() {

              if (typeof(jQuery.fn.sparkline) === 'undefined') {
                return;
              }
              console.log('init_sparklines');


              $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                type: 'bar',
                height: '125',
                barWidth: 13,
                colorMap: {
                  '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
              });


              $(".sparkline_two").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                type: 'bar',
                height: '40',
                barWidth: 9,
                colorMap: {
                  '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
              });


              $(".sparkline_three").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
                type: 'line',
                width: '200',
                height: '40',
                lineColor: '#26B99A',
                fillColor: 'rgba(223, 223, 223, 0.57)',
                lineWidth: 2,
                spotColor: '#26B99A',
                minSpotColor: '#26B99A'
              });


              $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
                type: 'bar',
                height: '40',
                barWidth: 8,
                colorMap: {
                  '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
              });


              $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
                type: 'line',
                height: '40',
                width: '200',
                lineColor: '#26B99A',
                fillColor: '#ffffff',
                lineWidth: 3,
                spotColor: '#34495E',
                minSpotColor: '#34495E'
              });


              $(".sparkline_bar").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5], {
                type: 'bar',
                colorMap: {
                  '7': '#a1a1a1'
                },
                barColor: '#26B99A'
              });


              $(".sparkline_area").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
                type: 'line',
                lineColor: '#26B99A',
                fillColor: '#26B99A',
                spotColor: '#4578a0',
                minSpotColor: '#728fb2',
                maxSpotColor: '#6d93c4',
                highlightSpotColor: '#ef5179',
                highlightLineColor: '#8ba8bf',
                spotRadius: 2.5,
                width: 85
              });


              $(".sparkline_line").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5], {
                type: 'line',
                lineColor: '#26B99A',
                fillColor: '#ffffff',
                width: 85,
                spotColor: '#34495E',
                minSpotColor: '#34495E'
              });


              $(".sparkline_pie").sparkline([1, 1, 2, 1], {
                type: 'pie',
                sliceColors: ['#26B99A', '#ccc', '#75BCDD', '#D66DE2']
              });


              $(".sparkline_discreet").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 2, 4, 3, 7, 8, 9, 7, 6, 4, 3], {
                type: 'discrete',
                barWidth: 3,
                lineColor: '#26B99A',
                width: '85',
              });


            };
            init_sparklines2();
          </script>

          <!-- Custom Theme Scripts -->
          <script src="../build/js/custom.min.js"></script>

      </body>

      </html>