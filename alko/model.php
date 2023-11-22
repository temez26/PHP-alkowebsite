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

function readPriceList($filename)
{
    // return values as global data
    global $priceListDate, $columnNames;

    $row = 0;
    $alkoDataIndex = 0;
    $alkoData = [];

    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if ($row === 0) {
                // Alkon hinnasto xx.xx.xxxx                
                $key = "Alkon hinnasto ";
                $keyLen = strlen($key);

                if ($key == substr($data[0], 0, strlen($key))) {
                    $priceListDate = substr($data[0], strlen($key));
                } else {
                    ;
                }
            } else if ($row === 1) {
                // Huom! ...- skipping
                ;
            } else if ($row === 2) {
                // empty line - skipping
                ;
            } else if ($row === 3) {
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
function createColumnNamesMap($cn)
{
    $cnMap = [];
    for ($i = 0; $i < count($cn); $i++) {
        // Creating a map with column names as keys and their indices as values
        $cnMap[$cn[$i]] = $i;
    }
    return $cnMap;
}

// Function to initialize model data
function initModel()
{
    global $alkoData, $columnNames, $columnNamesMap, $filename;

    // Reading price list data and creating a map of column names
    $alkoData = readPriceList($filename);
    $columnNamesMap = createColumnNamesMap($columnNames);

    return $alkoData;
}






?>