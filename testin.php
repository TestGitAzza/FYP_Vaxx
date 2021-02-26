
 <?php require_once('mysql_connect.php'); ?>
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
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button class="btn btn-primary" type="submit" values="Submit" name="submit"> Register Patient </button>
                      </div>
                    </div>


                  </form>
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
            $query = "INSERT INTO patient (fullname, gender, birthday, address, parents, mykid, placebirth, nationality, phone) VALUES ('$fullname','$gender','$birthday','$address', '$parents','$mykid', '$placebirth', '$nationality', '$phone')";
            $result = mysqli_query($dbc, $query);
          }
        }
          ?>