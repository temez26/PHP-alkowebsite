<?php

require_once('../vendor/shuchkin/simplexlsx/src/SimpleXLSX.php');


// Function to test parsing an XLSX file
function testXlxs($filename_xlsx)
{
    if ($xlsx = SimpleXLSX::parse($filename_xlsx)) {
        // If successfully parsed, print the rows of the XLSX file
        print_r($xlsx->rows());
    } else {
        // If parsing fails, display an error message
        $msg = "Error:" . $filename_xlsx;
        echo $msg;
        echo SimpleXLSX::parseError();
    }
}

// Remote and local filenames for XLSX file
$remote_filename_xlsx = "https://www.alko.fi/INTERSHOP/static/WFS/Alko-OnlineShop-Site/-/Alko-OnlineShop/fi_FI/Alkon%20Hinnasto%20Tekstitiedostona/alkon-hinnasto-tekstitiedostona.xlsx";
// For Excel file
$local_filename_xlsx = __DIR__ . "/alkon-hinnasto.xlsx"; // Save in the same directory as updatefile.php

// For CSV file
$local_filename_csv = __DIR__ . "/alkon-hinnasto.csv"; // Save in the same directory as updatefile.php

function fetchXlxs($remote_filename_xlsx, $local_filename_xlsx)
{
    // Fetch the remote file
    $xlsxContent = file_get_contents($remote_filename_xlsx);
    if ($xlsxContent != false) {
        // If fetching is successful, save the content to a local file
        $bytesWritten = file_put_contents($local_filename_xlsx, $xlsxContent);
        if ($bytesWritten != false) {
            // File saved successfully
        } else {
            // Error saving the file content
        }
    } else {
        // Failed to fetch
    }
}

function xlsxToCsv($local_filename_xlsx, $local_filename_csv)
{
    // Convert the XLSX file to a CSV file
    if ($xlsx = SimpleXLSX::parse($local_filename_xlsx)) {
        // If successfully parsed, convert the rows of the XLSX file to CSV format
        $csvFile = fopen($local_filename_csv, 'w');
        foreach ($xlsx->rows() as $fields) {
            fputcsv($csvFile, $fields, ';'); // Use semicolon as the delimiter
        }
        fclose($csvFile);
    } else {
        // If parsing fails, display an error message
        $msg = "Error:" . $filename_xlsx;
        echo $msg;
        echo SimpleXLSX::parseError();
    }
}

// Fetch the XLSX file and convert it to a CSV file
fetchXlxs($remote_filename_xlsx, $local_filename_xlsx);
xlsxToCsv($local_filename_xlsx, $local_filename_csv);
