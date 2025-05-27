# Alko Product Catalog

A PHP-based web application for browsing Alko's product catalog with advanced filtering and pagination capabilities.

## Features

- **Automated Data Updates**: Daily synchronization with Alko's product database via XLSX/CSV conversion
- **Advanced Filtering**: Filter products by type, country, bottle size, and additional criteria
- **Pagination**: 25 products per page with intuitive navigation
- **Responsive Design**: Bootstrap-based UI for optimal user experience
- **Modular Architecture**: Organized MVC structure for maintainability

## Architecture

```
├── index.php           # Application entry point
├── model.php           # Data layer and CSV processing
├── controller.php      # Business logic and request handling
├── view.php           # Presentation layer
├── config.php         # Application configuration
├── data/
│   ├── updatefile.php # Automated data synchronization
│   └── alkon-hinnasto.csv
└── scripts/
    ├── php/           # Pagination, forms, and utilities
    └── js/            # Client-side functionality
```

## Data Synchronization

The application automatically fetches and processes Alko's product data:

- **Schedule**: Daily at 10:50 AM via cron job
- **Process**: XLSX → CSV conversion for optimal performance
- **Functions**: `fetchXlxs()`, `xlsxToCsv()`, `console_log()`

## Demo

Live application: [Alko Product Catalog](https://niisku.lab.fi/~x108669/alko/)

## Technical Stack

- **Backend**: PHP with MVC architecture
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Data Processing**: SimpleXLSX library
- **File Format**: CSV for data storage and retrieval
