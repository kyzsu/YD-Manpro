<?php
function jsonToCSV($jfilename, $cfilename)
{
    if (($json = file_get_contents($jfilename)) == false)
        die('Error reading json file...');
    $data = json_decode($json, true);
    $fp = fopen($cfilename, 'w');

    $header = false;
    foreach ($data['records'] as $row)
    {
        if (empty($header))
        {
            $header = array_keys($row);
            fputcsv($fp, $header);
            $header = array_flip($header);
        }
        fputcsv($fp, array_merge($header, $row));
    }
    fclose($fp);
    return;
}


$json_filename = 'json\karyawan.json';
$csv_filename = 'data.csv';
jsonToCSV($json_filename, $csv_filename);
echo 'Successfully converted json to csv file. <a href="' . $csv_filename . '" target="_blank">Click here to open it.</a>';
?>
<br>
<a href="view_karyawan.php">Go Back</a>