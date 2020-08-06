<?php

if (isset($_GET["nik"])) {
    $nik = (int) $_GET["nik"];
    $all = file_get_contents('json\karyawan.json');
    $all = json_decode($all, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$nik];

    if ($jsonfile) {
        unset($all["records"][$nik]);
        $all["records"] = array_values($all["records"]);
        file_put_contents("json\karyawan.json", json_encode($all));
    }
    header("Location: view_karyawan.php");
}