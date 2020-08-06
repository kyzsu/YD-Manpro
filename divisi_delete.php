<?php

if (isset($_GET["kode"])) {
    $kode = (int) $_GET["kode"];
    $all = file_get_contents('json/divisi.json');
    $all = json_decode($all, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$kode];

    if ($jsonfile) {
        unset($all["records"][$kode]);
        $all["records"] = array_values($all["records"]);
        file_put_contents("json/divisi.json", json_encode($all));
    }
    header("Location: view_divisi.php");
}