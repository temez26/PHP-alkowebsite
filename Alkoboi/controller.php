<?php

// url parameters must have correct values if not defined ni url
function handleRequest() {
    
    $filters['MODE'] = $_GET['mode'] ?? 'view'; // 'view' should be enclosed in quotes
    $filters['TYPE'] = $_GET['type'] ?? null;
    $filters['LIMIT'] = $_GET['limit'] ?? 20;
    $filters['PAGE'] = $_GET['page'] ?? 0;
    $filters['COUNTRY'] = $_GET['country'] ?? null;
    $filters['PRICELOW'] = $_GET['priceLow'] ?? null;
    $filters['PRICEHIGH'] = $_GET['priceHigh'] ?? null;

    return $filters;    
} 

