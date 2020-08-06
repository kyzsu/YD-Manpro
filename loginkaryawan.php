<?php
    $dbkaryawan = file_get_contents("json/karyawan.json");
    $dbkaryawan = json_decode($dbkaryawan, TRUE);
    $jumlah['records'] = count($dbkaryawan["records"]);

   if(isset($_POST['username']) && isset($_POST['password'])) {
        for($i=0; $i < $jumlah['records']; $i++) {
            if($dbkaryawan["records"][$i]['nik'] == $_POST['username']) {
                if($dbkaryawan["records"][$i]['password'] == $_POST['password']) {
                    $akses = "2";
                    $success = TRUE;
                    $nik = $dbkaryawan["records"][$i]['nik'];
                    $nama = $dbkaryawan["records"][$i]['nama'];
                    break; 
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
        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $nama;
        $_SESSION['akses'] = $akses;
        header("Location: view_dashboard.php");
    } 
    else {

        echo "<script type='text/javascript'> alert('Username atau Password Salah')</script>";
        // header("Location: view_login.php");
    }
?>