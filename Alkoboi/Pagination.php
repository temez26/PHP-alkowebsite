<?php

$alkoData = initModel();
$filters = handleRequest();

$alkoProductTable = generateView($alkoData, $filters, 'products');
$rowsFound = count($alkoData);
echo "<div id=\"tbl-header\" class=\"alert alert-success\" role=\"\">Alkon hinnasto $priceListDate (Total items $rowsFound)</div>";

$currpage = isset($filters['PAGE']) ? $filters['PAGE'] : 0;
$prevpage = $currpage > $filters['LIMIT'] ? $currpage - $filters['LIMIT'] : 0;
$nextpage = $currpage + $filters['LIMIT'];

// Get the current URL parameters
$params = $_GET;

// Update the URL parameters with the new filters
$country = isset($_COOKIE['country']) && $_COOKIE['country'] !== "" ? "&country=" . $_COOKIE['country'] : "";
$priceLow = isset($_COOKIE['priceLow']) && $_COOKIE['priceLow'] !== "" ? "&priceLow=" . $_COOKIE['priceLow'] : "";
$priceHigh = isset($_COOKIE['priceHigh']) && $_COOKIE['priceHigh'] !== "" ? "&priceHigh=" . $_COOKIE['priceHigh'] : "";
$type = isset($_COOKIE['type']) && $_COOKIE['type'] !== "" ? "&type=" . $_COOKIE['type'] : "";
$energyLow = isset($_COOKIE['energyLow']) && $_COOKIE['energyLow'] !== "" ? "&energyLow=" . $_COOKIE['energyLow'] : "";
$energyHigh = isset($_COOKIE['energyHigh']) && $_COOKIE['energyHigh'] !== "" ? "&energyHigh=" . $_COOKIE['energyHigh'] : "";
$bottleSize = isset($_COOKIE['bottleSize']) && $_COOKIE['bottleSize'] !== "" ? "&bottleSize=" . $_COOKIE['bottleSize'] : "";

// Build the URL with the updated parameters
$url = './index.php?' . http_build_query($params);

echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col text-left'>";
echo "<input type='button' class='btn btn-primary' onClick=\"location.href='" . $url . "&page=" . $prevpage . $country . $priceLow . $priceHigh . $type . $energyLow . $energyHigh . $bottleSize . "'\" value='prev'>";
echo "</div>";
echo "<div class='col text-center pb-1'>";
echo '<input type="button" class="btn btn-primary mr-2" onclick="setCookies(true)" value="Reset Filter">';
echo '<input type="button" class="btn btn-primary" onclick="setCookies()" value="Set Filter">';
echo "</div>";

echo "<div class='col text-right'>";
echo "<input type='button' class='btn btn-primary' onClick=\"location.href='" . $url . "&page=" . $nextpage . $country . $priceLow . $priceHigh . $type . $energyLow . $energyHigh . $bottleSize . "'\" value='next'>";
echo "</div>";
echo "</div>";
echo "</div>";


?>
