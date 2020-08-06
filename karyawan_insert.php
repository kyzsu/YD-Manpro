<?php 
    if (!empty($_POST)) { 
        $nik      = $_POST['nik'];    
        $nama  = $_POST['nama'];
        $alamat   = $_POST['alamat'];
        $no_telp   = $_POST['no_telp'];
        $email    = $_POST['email'];
        $kode_divisi = $_POST['kode_divisi'];
        $password = $_POST['password'];
        $uid      = $_POST['uid'];
      
        $file = file_get_contents('json\karyawan.json');
        $data = json_decode($file, true);
        unset($_POST["add"]);
        $data["records"] = array_values($data["records"]);
        array_push($data["records"], $_POST);
        file_put_contents("json\karyawan.json", json_encode($data));
        header("Location: view_karyawan.php");
    }
?>

<?php
  session_start();
  $nama = $_SESSION['nama'];
  $akses = $_SESSION['akses'];
  $getfile = file_get_contents('json\karyawan.json');
  $jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon icon -->
      <link href="assets/images/k2i.png" rel='icon' type='image/x-icon'/>
      <title>KARYAWAN | FTI UKSW</title>
      <!-- Bootstrap Core CSS -->
      <link href="assets/monster-lite/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="assets/monster-lite/lite version/css/style.css" rel="stylesheet">
      <!-- You can change the theme colors from here -->
      <link href="assets/monster-lite/lite version/css/colors/blue.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>

  <body class="fix-header card-no-border">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <!-- <div class="preloader">
          <svg class="circular" viewBox="25 25 50 50">
              <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
      </div> -->
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div id="main-wrapper">
          <!-- ============================================================== -->
          <!-- Topbar header - style you can find in pages.scss -->
          <!-- ============================================================== -->
          <header class="topbar">
              <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                  <!-- ============================================================== -->
                  <!-- Logo -->
                  <!-- ============================================================== -->
                  <div class="navbar-header">
                      <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/k2i.png" height="42" width="42"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                          <strong>SIA</strong>
                        </span> 
                      </a>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Logo -->
                  <!-- ============================================================== -->
                  <div class="navbar-collapse">
                      <!-- ============================================================== -->
                      <!-- toggle and nav items -->
                      <!-- ============================================================== -->
                      <ul class="navbar-nav mr-auto mt-md-0 ">
                          <!-- This is  -->
                          <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                      </ul>
                      <!-- ============================================================== -->
                      <!-- User profile and search -->
                      <!-- ============================================================== -->
                      
                      <ul class="navbar-nav my-lg-0">
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $nama; ?></a>
                          </li>
                      </ul>
                  </div>
              </nav>
          </header>
          <!-- ============================================================== -->
          <!-- End Topbar header -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Left Sidebar - style you can find in sidebar.scss  -->
          <!-- ============================================================== -->
          <aside class="left-sidebar">
              <!-- Sidebar scroll-->
              <div class="scroll-sidebar">
                  <!-- Sidebar navigation-->
                  <nav class="sidebar-nav">
                      <ul id="sidebarnav">

                          <!--Akses Menu Untuk Admin-->
                          <?php if($akses=='1'):?>
                              <li><a href="view_dashboard.php" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a></li>
                              <li><a href="view_karyawan.php" class="waves-effect active"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Data Karyawan</a></li>
                              <li><a href="view_divisi.php" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Divisi</a></li>
                              <li><a href="view_absensi.php" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Absensi</a></li>

                          <!--Akses Menu Untuk Karyawan-->
                          <?php else:?>
                              <li><a href="view_dashboard.php" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a></li>
                              <li><a href="view_absensi.php" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Absensi</a></li>  
                          <?php endif;?>
                      </ul>
                      <div class="text-center m-t-30">
                          <a href="logout.php" class="btn btn-danger"><i class="fa fa-power-off"></i> Logout</a>
                      </div>
                  </nav>
                  <!-- End Sidebar navigation -->
              </div>
              <!-- End Sidebar scroll-->
          </aside>
          <!-- ============================================================== -->
          <!-- End Left Sidebar - style you can find in sidebar.scss  -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Page wrapper  -->
          <!-- ============================================================== -->
          <div class="page-wrapper">
              <!-- ============================================================== -->
              <!-- Container fluid  -->
              <!-- ============================================================== -->
              <div class="container-fluid">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="row page-titles">
                      <div class="col-md-6 col-8 align-self-center">
                          <h3 class="text-themecolor m-b-0 m-t-0">Add Karyawan</h3>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                              <li class="breadcrumb-item"><a href="view_karyawan.php">Karyawan</a></li>
                              <li class="breadcrumb-item active">Add Karyawan</li>
                          </ol>
                      </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- Start Page Content -->
                  <!-- ============================================================== -->
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-block">
                                 <form method="POST" action="">

                                    <div class="form-body">
                                      <div class="form-group">
                                          <label class="control-label col-md-5">Nik</label>
                                          <div class="col-md-9">
                                              <input name="nik" placeholder="Nik" class="form-control" type="number">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">Nama</label>
                                          <div class="col-md-9">
                                              <input name="nama" placeholder="Nama" class="form-control" type="text">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">Alamat</label>
                                          <div class="col-md-9">
                                              <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">No Telepon</label>
                                          <div class="col-md-9">
                                              <input name="no_telp" placeholder="No Telepon" class="form-control" type="number">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">Email</label>
                                          <div class="col-md-9">
                                              <input name="email" placeholder="Email" class="form-control" type="email">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">Kode Divisi</label>
                                          <div class="col-md-9">
                                              <select name="kode_divisi" id="divisi" class="form-control">
                                                  <option value="None" selected="Selected">--Select Divisi--</option>
                                              </select>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">Password</label>
                                          <div class="col-md-9">
                                              <input name="password" placeholder="Password" class="form-control" type="password">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-md-5">UID</label>
                                          <div class="col-md-9">
                                              <select name="uid" id="finger" class="form-control">
                                                  <option value="None" selected="Selected">--Select UID--</option>
                                              </select>
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                                      <button type="submit" id="btnSave" class="btn btn-info">Save</button>
                                      <a type="button" href="view_karyawan.php" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                  </div>  
                                </form> 
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End PAge Content -->
                  <!-- ============================================================== -->
              </div>
              <!-- ============================================================== -->
              <!-- End Container fluid  -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- footer -->
              <!-- ============================================================== -->
              <footer class="footer text-center">
                  © 2020 Yosefa Dia
              </footer>
              <!-- ============================================================== -->
              <!-- End footer -->
              <!-- ============================================================== -->
          </div>
          <!-- ============================================================== -->
          <!-- End Page wrapper  -->
          <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Wrapper -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->
      <script src="assets/monster-lite/assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/monster-lite/assets/plugins/bootstrap/js/tether.min.js"></script>
      <script src="assets/monster-lite/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/monster-lite/lite version/js/jquery.slimscroll.js"></script>
      <script src="assets/monster-lite/lite version/js/waves.js"></script>
      <script src="assets/monster-lite/lite version/js/sidebarmenu.js"></script>
      <script src="assets/monster-lite/lite version/js/custom.min.js"></script>
      <script src="assets/monster-lite/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <script src="assets/monster-lite/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
      <script type="text/javascript">
        $.getJSON("json/divisi.json", function(obj) {
            $.each(obj.records, function(key, value) {
                $("#divisi").append("<option>" + value.kode + " - " + value.nama_divisi + "</option>");
            });
        });
        $.getJSON("json/fingerprint.json", function(obj) {
            $.each(obj.records, function(key, value) {
                $("#finger").append("<option>" + value.uid + " - " + value.nama + "</option>");
            });
        });
      </script>

  </body>

</html>