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

- `index.php`: Main PHP file displaying the product catalog and applying filters.
- `includes/header.php` and `includes/footer.php`: Reusable header and footer components for HTML structure.
- `css/style.css`: Stylesheet for the web application.
- `js/script.js`: JavaScript file for client-side scripting.





