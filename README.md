# Alko Product Catalog 🍷

This repository houses a straightforward web application constructed with PHP. Its primary function is to showcase a product catalog from Alko’s store. Users can conveniently browse through the catalog and apply filters based on various criteria like product type, country of manufacture, and more.

## Overview ℹ️

The application retrieves data from Alko’s servers in the form of an XLSX file, which is then transformed into a CSV file. This CSV file undergoes daily updates with the most recent product information. The web application employs this CSV file to present the product table on the webpage.

## Project Structure 📂

The project directory structure is organized as follows:

- `scripts/js/Cookies.js`: A custom JavaScript file handling the cookie functionality.
- `model.php`: PHP file fetching and converting data from Alko’s servers, extracting data from the CSV file.
- `controller.php`: PHP file managing user input and passing it to the model and view.
- `view.php`: PHP file rendering the HTML output, displaying the product table and filters.
- `config.php`: PHP file containing configuration settings for the application (remote/local file names, PHP error reporting level).
- `index.php`: The main PHP file including the model, controller, and view files.
- `scripts/php/Pagination.php`: PHP file managing pagination for the product table.
- `scripts/php/Form.php`: PHP file handling form functionality for the filters.
- `scripts/php/List.php`: PHP file managing list functionality for the product table.

## Files and Components 📝

`model.php`: This file contains the following functions:
- `console_log($output)`: Logs a message to the browser console.
- `fetchXlxs($remote_filename_xlsx, $local_filename_xlsx)`: Fetches the XLSX file from the remote URL and saves it locally. It doesn't fetch the file again if the local file exists and was modified today.
- `xlsxToCsv($local_filename_xlsx, $local_filename_csv)`: Converts the XLSX file to a CSV file. It doesn't convert the file again if the local CSV file exists and was modified today.
- `getDateFromCsv($local_filename_csv)`: Extracts the date from the first line of the CSV file.

The script executes the following steps:
1. Fetch the XLSX file.
2. Convert the XLSX file to a CSV file.
3. Extract the date from the CSV file.
