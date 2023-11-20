# Alko Product Catalog 🍷

This project is a simple web application built using PHP to display a product catalog from Alko's store.

## Overview ℹ️

The application allows users to browse through the product catalog and apply filters based on different criteria such as type, country of manufacture, and more.
App gets data form alkos servers as xlsx file and then converts it to csv file and the csv fetch is daily in model.php file there is functions that gets the data converts it and then update date from the csv file to the $priceListDate variable and then the variable data is displayed in the header.


## Project Structure 📂

The project directory structure is organized as follows:

- The application uses a custom JavaScript file `scripts/js/Cookies.js`.
- The PHP settings are configured to display all errors except deprecated ones.
- The application includes several PHP files:
  - `model.php`
  - `controller.php`
  - `scripts/php/Pagination.php`
  - `scripts/php/Form.php`
- The main feature of the application is the Alko product table which is displayed on the webpage.

## Usage 🚀

1. Clone the repository.
2. Ensure a local server (e.g., XAMPP, WAMP) is running.
3. Place the project in the server's directory.
4. Open the browser and navigate to the project's URL.

## Files and Components 📝

- In the module.php happens the fetch for the newest data form the alkos server

Functions
console_log($output): Logs a message to the browser console.
fetchXlxs($remote_filename_xlsx, $local_filename_xlsx): Fetches the XLSX file from the remote URL and saves it locally. If the local file already exists and was last modified today, it does not fetch the file again.
xlsxToCsv($local_filename_xlsx, $local_filename_csv): Converts the XLSX file to a CSV file. If the local CSV file already exists and was last modified today, it does not convert the file again.
getDateFromCsv($local_filename_csv): Extracts the date from the first line of the CSV file.


The script executes the following steps:

Fetch the XLSX file.
Convert the XLSX file to a CSV file.
Extract the date from the CSV file.
