<?php

// Function to create table column headers
function createColumnHeaders($columns2Include) {
    $t = "<thead><tr>";
    foreach ($columns2Include as $val) {
        $t .= '<th scope="col">' . $val . "</th>";
    }
    $t .= "</tr></thead>";
    return $t;
}

// Function to create a table row based on product data and specified columns
function createTableRow($product, $columns2Include, $columnNamesMap) {
    $t = "<tr>";
    foreach ($columns2Include as $columnName) {
        $item = $product[$columnNamesMap[$columnName]];
        $t .= "<td>" . $item . "</td>";
    }
    $t .= "</tr>";
    return $t;
}

// Function to generate a table of Alko products based on filters and pagination
function createAlkoProductsTable($products, $columns2Include, $columnNamesMap, $filters, $tblId) {
    $page = $filters['PAGE'];
    $limit = 25;
    $start = ($page - 1) * $limit;
    $end = $start + $limit;

    // Filtered and paginated products
    $filteredProducts = [];
    foreach ($products as $product) {
        // Apply filters here based on user criteria
        if (($filters['TYPE'] === null || $product[$columnNamesMap['Tyyppi']] === $filters['TYPE']) &&
            ($filters['COUNTRY'] === null || $product[$columnNamesMap['Valmistusmaa']] === $filters['COUNTRY']) &&
            ($filters['PRICELOW'] === null || $product[$columnNamesMap['Hinta']] >= $filters['PRICELOW']) &&
            ($filters['PRICEHIGH'] === null || $product[$columnNamesMap['Hinta']] <= $filters['PRICEHIGH']) &&
            ($filters['BOTTLESIZE'] === null || $product[$columnNamesMap['Pullokoko']] === $filters['BOTTLESIZE']) &&
            ($filters['ENERGYLOW'] === null || $product[$columnNamesMap['Energia kcal/100 ml']] >= $filters['ENERGYLOW']) &&
            ($filters['ENERGYHIGH'] === null || $product[$columnNamesMap['Energia kcal/100 ml']] <= $filters['ENERGYHIGH'])) {
            $filteredProducts[] = $product;
        }
    }

    // Pagination
    $pagedProducts = array_slice($filteredProducts, $start, $limit);

    // Generate table markup for the paged products
    $t = '<table class="table">';
    $t .= createColumnHeaders($columns2Include);
    $t .= '<tbody>';
    foreach ($pagedProducts as $product) {
        $t .= createTableRow($product, $columns2Include, $columnNamesMap);
    }
    $t .= '</tbody>';
    $t .= '</table>';

    return $t;
}

// Function to generate the view based on provided data and filters
function generateView($alkoData, $filters, $tblId = null) {
    global $columns2Include, $columnNamesMap;

    if ($filters['MODE'] === 'view') {
        // Create the Alko products table for viewing
        $alkoProductTable = createAlkoProductsTable(
            $alkoData, $columns2Include, $columnNamesMap, $filters, $tblId);
        return $alkoProductTable;
    } else if ($filters['MODE'] === 'update') {
        // TODO: Update the CSV file
        return "<h2>Update CSV file from original source</h2>";
    } else {
        // TODO: Handle unknown command
        return "<h2>Unknown command</h2>";
    }
}
?>
