# Alko Product Catalog 🍷

This repository contains a PHP-based web application that showcases Alko’s product catalog. Users can browse and filter products by type, country of manufacture, and more.

## Overview 📌 ℹ️

The app fetches data from Alko’s servers as an XLSX file, converts it into a daily updated CSV file, and uses this CSV file to display the product table on the webpage.
the webpage contains 25 rows per page and 10 columns.

### Project Structure 📂

- `scripts/js/Cookies.js`: Custom JavaScript handling cookies.
- `model.php`: Fetches data from Alko’s servers, extracts information from the CSV file.
- `controller.php`: Manages user input and interacts with the model and view.
- `view.php`: Renders the HTML output, displaying the product table and filters.
- `config.php`: Contains configuration settings for the CSV file.
- `index.php`: Main file including the model, controller, and view.
- `scripts/php/Pagination.php`: Manages pagination for the product table.
- `scripts/php/Form.php`: Contains inputs for the filters.
- `scripts/php/List.php`: Contains filter names for country, bottle size, and type.

### How `model.php` Fetches Latest XLSX File 📝

`model.php` contains functions:
- `console_log($output)`: Logs a message to the browser console.
- `fetchXlxs($remote_filename_xlsx, $local_filename_xlsx)`: Fetches the XLSX file from the remote URL and saves it locally.
- `xlsxToCsv($local_filename_xlsx, $local_filename_csv)`: Converts the XLSX file to a CSV file.


The script executes these steps:
- first checks the date of the file.
- Fetch the XLSX file.
- Convert it to a CSV file.


### Access the Alko Product Catalog 🌐

The web application is accessible at [Alko Product Catalog](https://niisku.lab.fi/~x108669/alko/)

### for evaluation 📝

- i made everything else but not the database connection.
- this project is divided separate modules.
- has 5 different filters for the products.
- page has 25 rows of products per page.
- user can browser catalogs using prev and next button.
- this updates the csv file every day from alkos server.
- some bootstrap ui added.
- code has documentation.
