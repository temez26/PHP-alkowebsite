<?php

// Include necessary files
require_once("config.php");
require_once("view.php");
require_once("controller.php");



// Get the default character set
$cs = ini_get("default_charset");

// Initialize variables
$columnNames = [];
$columnNamesMap = [];
$alkoData = [];

function readPriceList($filename) {
    // return values as global data
    global $priceListDate, $columnNames; 
    
    $row = 0;
    $alkoDataIndex = 0;
    $alkoData = [];
    
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if( $row === 0 ) {
                // Alkon hinnasto xx.xx.xxxx                
                $key = "Alkon hinnasto ";                
                $keyLen = strlen($key);
                
                if( $key == substr($data[0], 0, strlen($key)) ) {
                    $priceListDate = substr($data[0],strlen($key));
                } else {
                    ;
                }
            } else if( $row === 1 ) {
                // Huom! ...- skipping
                ;
            } else if( $row === 2 ) {
                // empty line - skipping
                ;
            } else if ( $row === 3 ) {
                // header names
                $columnNames = $data;
            } else {
                // normal rows starts here
                $alkoData[$alkoDataIndex] = $data;
                $alkoDataIndex++;
            }
            $row++;
        }
        fclose($handle);
    }    
    return $alkoData;
}

// Function to create a map of column names
function createColumnNamesMap($cn) {
    $cnMap = [];
    for ($i = 0; $i < count($cn); $i++) {
        // Creating a map with column names as keys and their indices as values
        $cnMap[$cn[$i]] = $i;
    }
    return $cnMap;
}

// Function to initialize model data
function initModel() {
    global $alkoData, $columnNames, $columnNamesMap, $filename;

    // Reading price list data and creating a map of column names
    $alkoData = readPriceList($filename);
    $columnNamesMap = createColumnNamesMap($columnNames);

    return $alkoData;
}

// Installing SimpleXLSX library
require_once(__DIR__.'/vendor/shuchkin/simplexlsx/src/SimpleXLSX.php');

// Function to test parsing an XLSX file
function testXlxs($filename_xlsx) {
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
$local_filename_xlsx = "data/alkon-hinnasto.xlsx";

// Local filename for CSV file
$local_filename_csv = "data/alkon-hinnasto.csv";
function console_log($output) {
    echo "<script>console.log('" . addslashes($output) . "');</script>";
}

function fetchXlxs($remote_filename_xlsx, $local_filename_xlsx) {
    // Check if the local file exists and was last modified today
    if (file_exists($local_filename_xlsx) && date('Y-m-d', filemtime($local_filename_xlsx)) == date('Y-m-d')) {
        console_log("Local file is up to date");
    } else {
        // Fetch the remote file
        $xlsxContent = file_get_contents($remote_filename_xlsx);
        if ($xlsxContent != false) {
            // If fetching is successful, save the content to a local file
            console_log("fetch success..saving");
            $bytesWritten = file_put_contents($local_filename_xlsx, $xlsxContent);
            if ($bytesWritten != false) {
                console_log("$bytesWritten bytes written to $local_filename_xlsx");
            } else {
                console_log("error saving the file content");
            }
        } else {
            console_log("failed");
        }
    }
}

function xlsxToCsv($local_filename_xlsx, $local_filename_csv) {
    // Check if the local CSV file exists and was last modified today
    if (file_exists($local_filename_csv) && date('Y-m-d', filemtime($local_filename_csv)) == date('Y-m-d')) {
        console_log("CSV file is up to date");
    } else {
        // Convert the XLSX file to a CSV file
        if ($xlsx = SimpleXLSX::parse($local_filename_xlsx)) {
            // If successfully parsed, convert the rows of the XLSX file to CSV format
            $csvFile = fopen($local_filename_csv, 'w');
            foreach ($xlsx->rows() as $fields) {
                fputcsv($csvFile, $fields, ';'); // Use semicolon as the delimiter
            }
            fclose($csvFile);
            console_log("XLSX file converted to CSV file successfully.");
        } else {
            // If parsing fails, display an error message
            $msg = "Error:" . $filename_xlsx;
            console_log($msg);
            console_log(SimpleXLSX::parseError());
        }
    }
}

function getDateFromCsv($local_filename_csv) {
    // Open the CSV file
    if (($handle = fopen($local_filename_csv, "r")) !== FALSE) {
        // Read the first line of the CSV file
        if (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            // The date is in the first field of the first line
            $dateString = $data[0];
            // Extract the date from the string
            preg_match('/\d{2}\.\d{2}\.\d{4}/', $dateString, $matches);
            if (count($matches) > 0) {
                // The date is in the format "dd.mm.yyyy"
                $priceListDate = $matches[0];
                console_log("Price list date: $priceListDate");
            } else {
                console_log("No date found in the first line of the CSV file");
            }
        }
        // Close the CSV file
        fclose($handle);
    } else {
        console_log("Error opening the CSV file");
    }
}

// Fetch the XLSX file
fetchXlxs($remote_filename_xlsx, $local_filename_xlsx);

// Convert the XLSX file to CSV file
xlsxToCsv($local_filename_xlsx, $local_filename_csv);

// Get the date from the CSV file
getDateFromCsv($local_filename_csv);


?>
