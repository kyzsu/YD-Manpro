<?php
    $dbadmin = file_get_contents("json/admin.json");
    $dbadmin = json_decode($dbadmin, TRUE);

   if(isset($_POST['username']) && isset($_POST['password'])) {
        for($i=0; $i < count($dbadmin); $i++) {
            if($dbadmin[$i]['username'] == $_POST['username']) {
                if($dbadmin[$i]['password'] == $_POST['password']) {
                    if($dbadmin[$i]['username'] && $dbadmin[$i]['password'] == "admin") {
                        $akses = "1";
                        $success = TRUE;
                        $username = $dbadmin[$i]['username'];
                        $nama = $dbadmin[$i]['nama'];
                        break; 
                    } else {
                        $success = FALSE;
                    }
                } else {
                    $success = FALSE;
                }
            } else {
                $success = FALSE;
            }
        }
    }

    if($success == TRUE) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;
        $_SESSION['akses'] = $akses;
        header("Location: view_dashboard.php");
    } 
    else {

        echo "<script type='text/javascript'> alert('Username atau Password Salah')</script>";
        // header("Location: view_login.php");
    }
?>