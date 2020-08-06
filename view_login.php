<!DOCTYPE html>
<html>
  <head>
    <title>Login SIAMA | FTI UKSW</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/images/k2i.png" rel='icon' type='image/x-icon'/>

  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            
            <div class="card-body">
              <h3 class="card-title text-center"><strong>Login</strong></h3>
              <form class="form-signin" action="login.php" method="post">
                <div class="form-group">
                  <label for="inputusername"><strong>Username</strong></label>
                  <input type="text" name="username" id="inputusername" class="form-control" placeholder="Username" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>" maxlength="9" required autofocus>
                </div>

                <div class="form-group">
                  <label for="inputpassword"><strong>Password</strong></label>
                  <input type="password" name="password" id="inputpassword" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="logedin">Login</button>
                <a href="view_loginkaryawan.php"> Login Karyawan </a>
              </form>
            </div>
            <!-- <?php if($this->session->flashdata('error')) { ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error');?>
              </div>
            <?php } ?> -->
          </div>
        </div>
      </div>
    </div> 
 
    <!-- jQuery-->
    <script src="'assets/bootstrap/js/jquery.js"></script>
    <!-- Bootsrap -->
    <script src="'assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
