<?php

function createColumnHeaders($columns2Include) {
    $t = "<thead><tr>";
    foreach ($columns2Include as $val) {
        $t .= '<th scope="col">' . $val . "</th>";
    }
    $t .= "</tr></thead>";
    return $t;
}

function createTableRow($product, $columns2Include, $columnNamesMap) {
    $t = "<tr>";
    foreach ($columns2Include as $columnName) {
        $item = $product[$columnNamesMap[$columnName]];
        $t .= "<td>" . $item . "</td>";
    }
    $t .= "</tr>";
    return $t;
}

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
            ($filters['PRICEHIGH'] === null || $product[$columnNamesMap['Hinta']] <= $filters['PRICEHIGH'])) {
            $filteredProducts[] = $product;
        }
    }

    // Pagination
    $pagedProducts = array_slice($filteredProducts, $start, $limit);

    // Generate table rows for the paged products
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

function generateView($alkoData, $filters, $tblId = null) {
    global $columns2Include, $columnNamesMap;

    if ($filters['MODE'] === 'view') {
        $alkoProductTable = createAlkoProductsTable(
            $alkoData, $columns2Include, $columnNamesMap, $filters, $tblId);
        return $alkoProductTable;
    } else if ($filters['MODE'] === 'update') {
        // TODO: Update the csv file
        return "<h2>Update csv file from original source</h2>";
    } else {
        // TODO unknown command
        return "<h2>Unknown command </h2>";
    }
}

