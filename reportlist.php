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
                <h3>Report List</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Report List <small>Print report here</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Ticket ID</th>
                          <th>Name</th>
                          <th>Department</th>
                          <th>Area</th>
                          <th>Issue</th>
                          <th>Date Issued</th>
                          <th>Last Update</th>
                          <th>Status</th>
                          <th>Comment</th>
                          <th>Completed by</th>
                        </tr>
                      </thead>


                      <tbody>
                <?php
                include "mysql_connect.php";
                if($_SESSION['user_role'] == "Civil Executor"){
                  $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") AND (rep_assign_to = "Civil Executor" OR rep_uid = "'.$_SESSION["id"].'") ORDER BY rep_date DESC';  
                }else if($_SESSION['user_role'] == "ME Executor"){
                  $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") AND (rep_assign_to = "ME Executor" OR rep_uid = "'.$_SESSION["id"].'") ORDER BY rep_date DESC';  
                }else if($_SESSION['user_role'] == "Issuer"){
                  $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") AND rep_uid = "'.$_SESSION["id"].'" ORDER BY rep_date DESC';  
                }else{
                  $query = 'SELECT * FROM report WHERE (rep_status != "Pending" AND rep_status != "Rejected") ORDER BY rep_date DESC';  
                }

                $result = mysqli_query($dbc, $query);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                          <td><?=$row['rep_ticketid']?></td>
                          <td><?=$row['rep_fullname']?></td>
                          <td><?=$row['rep_department']?></td>
                          <td><?=$row['rep_area']?></td>
                          <td><?=$row['rep_issue']?></td>
                          <td><?=$row['rep_date']?></td>
                          <td><?=$row['rep_last_update']?></td>
                          <td><?=$row['rep_status']?></td>
                          <td><?=$row['rep_comment']?></td>
                          <td><?php
                          if($row['rep_cid'] == 0){
                            echo "Not completed yet";
                          }else{

                            $query2 = 'SELECT * FROM user WHERE id = "'.$row['rep_cid'].'"';
                    
                                    $result2 = mysqli_query($dbc, $query2);
                    
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                      echo "Completed by ".$row2['user_name'];
                                    }
                          }
                          ?>
                          </td>
                        </tr>
                        <?php
                }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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
