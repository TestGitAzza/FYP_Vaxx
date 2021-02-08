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
                <h3>List of Doctors</h3>
              </div><?php
              date_default_timezone_set("Asia/Kuala_Lumpur");
                  echo "Time : " . date("h:i:sa"); ?>
              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row"> 
            <div class="col-md-12 col-sm-12 ">   
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Date : <?php
                  $d=strtotime("tomorrow");
                  echo date ('d/m/Y', $d) . "<br>"; 
                  

                  ?></small></h2> 
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div  class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                    <table id="datatable" class="table table-striped" style="width:100%">
                    <?php
             	     require_once ('mysql_connect.php'); // Connect to the db.		
             	     $query = "SELECT * from schedule_doc";		
             	     $result = mysqli_query ($dbc, $query); // Run the query.
             	     $num = mysqli_num_rows($result);
             	     
             	     if ($num > 0) { // If it ran OK, display the records.
      
                 	// Table header.
                 	                 	echo '                      <thead>
                                      <tr>
                                        <th>Appointment ID</th>
                                        <th>Patient ID</th>
                                        <th> Doctor </th>
                                        <th> Date of appointment </th>
                                        <th> Time of Appointment </th>
                                        <th> Appointment Type </th>

                                      </tr>
                                    </thead>';

                 	                 	while ($row = mysqli_fetch_assoc($result)) {
                                        echo 
                                        
                                        '
                                      <tr>
                                      <td>' . $row['id_appoint'] . '</td>
                                      <td>' . $row['mykid'] . '</td>
                                      <td>' .$row['doct_name'] . '</td>
                                      <td>' . date_format(new DateTime($row['start_sch']), 'd/m/Y') . '</td>
                                      <td>' . date_format(new DateTime($row['start_sch']), 'G:ia') . '</td>
                                      <td>' . $row['sappt_type'] . '</td>

                                    </tr>                                       
                 	                 		';
                 	      
                 	             	     	}
                 	             	     
                 	             	     	echo '</table>';
             	     	
             	     	mysqli_free_result ($result); // Free up the resources.	
             	     }
             	     	
             	     	mysqli_close($dbc); // Close the database connection.
             	     	
             	     	?> 
                    </table>
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
