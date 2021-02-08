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
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
			<form action="confirmreg.php" method="post"> 
			<div class="item form-group">
                        <label for="fullname" class="col-form-label col-md-3 col-sm-3 label-align">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="fullname" class="form-control" type="text" name="fullname">
                        </div>
                      </div>
					  <div class="item form-group">
                      <label for="gender" class="col-form-label col-md-3 col-sm-3 label-align">Gender *:</label>
                      <div class="col-md-6 col-sm-6">
                      <p>
                        Male:
                        <input type="radio" class="flat" name="gender" id="genderM" value="Male" checked="" required /> Female:
                        <input type="radio" class="flat" name="gender" id="genderF" value="Female" />
					  </p></div></div>
					  
                      <div class="item form-group">
                        <label for="birthday" class="col-form-label col-md-3 col-sm-3 label-align">Date of Birth<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="birthday" class="form-control" type="date" name="birthday">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label for="parents" class="col-form-label col-md-3 col-sm-3 label-align">Mother's Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="parents" class="form-control" type="text" name="parents">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label for="mykid" class="col-form-label col-md-3 col-sm-3 label-align"> MyKid <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input id="mykid" class="form-control" type="text" name="mykid">
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
                              <input id="placebirth" class="form-control" type="text" name="placebirth">
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
                              <input id="phone" class="form-control" type="text" name="phone">
                          </div>      
                    </div>    

                      <div class="ln_solid"></div>

                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button class="btn btn-primary" type="submit" values="Submit" name="submit" > Register Patient  </button>
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
      include_once "footer.php";
      ?>
