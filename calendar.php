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
      <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
      <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">


      <body class="nav-md">
        <div class="container body">
          <div class="main_container">


            <!-- page content -->
            <div class="right_col" role="main">
              <div class="">
                <div class="page-title">
                  <div class="title_left">
                    <h3>Calendar</h3>
                  </div>
                </div>
                <div class="clearfix">
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Calendar Events </h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div id='calendar'></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /page content -->


          </div>
        </div>

        <!-- calendar modal -->
        <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
              </div>
              <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                  <!-- <form id="antoform" class="form-horizontal calender" role="form"> -->
                    <div class="form-group">
                      <form action="calendar.php" method="post">
                        <label class="col-sm-3 control-label">Add New appointment</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary antosubmit">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
              </div>
              <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                  <form id="antoform2" class="form-horizontal calender" role="form">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Title 2</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title2" name="title2">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description 2</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary antosubmit2">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <?php
        // $dbc = new mysqli("localhost", "root", "", "vaccination");
        // if ($dbc == false) {
        //   die("ERROR: Could not connect. " . $dbc->connect_error);
        // }
        // $sql = "INSERT INTO testcalendar (title, title2, descr, descr2) VALUES ('sss', 'sa', 'aa','io')";
        // if ($dbc->query($sql) == true) {
         
        // } else {
        //   echo "ERROR: Could not able to execute $sql . " . $dbc->error;
        // }
        // ?>
        <?php
        

        //load.php
        
        $connect = new PDO('mysql:host=localhost;dbname=vaccination', 'root', '');
        
        $data = array();
        
        $query = "SELECT * FROM testcalendar ORDER BY id_calendar";
        
        $statement = $connect->prepare($query);
        
        $statement->execute();
        
        $result = $statement->fetchAll();
        
        foreach($result as $row)
        {
         $data[] = array(
          'id'   => $row["id"],
          'title'   => $row["title"],
          'start'   => $row["start_event"],
          'end'   => $row["end_event"]
         );
        }
        
        echo json_encode($data); 
         
        ?>
        <script>
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    }
        
</script>

        <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
        <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
        <!-- /calendar modal -->

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



        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
<script> document.getElementById('my-button').addEventListener('click', function() {
  var date = calendar.getDate();
  alert("The current date of the calendar is " + date.toISOString());
}); </script>
      </body>

      </html>