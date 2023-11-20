Alko Product Catalog 🍷
This project is a simple web application built using PHP to display a product catalog from Alko’s store. The application allows users to browse through the product catalog and apply filters based on different criteria such as type, country of manufacture, and more.

Overview ℹ️
The application gets data from Alko’s servers as an XLSX file and then converts it to a CSV file. The CSV file is updated daily with the latest product information. The application uses the CSV file to display the product table on the webpage.

Project Structure 📂
The project directory structure is organized as follows:

scripts/js/Cookies.js: A custom JavaScript file that handles the cookie functionality.
model.php: A PHP file that fetches and converts the data from Alko’s servers and extracts the date from the CSV file.
controller.php: A PHP file that handles the user input and passes it to the model and the view.
view.php: A PHP file that renders the HTML output and displays the product table and the filters.
config.php: A PHP file that contains the configuration settings for the application, such as the remote and local file names and the PHP error reporting level.
index.php: The main PHP file that includes the model, the controller, and the view files.
scripts/php/Pagination.php: A PHP file that handles the pagination functionality for the product table.
scripts/php/Form.php: A PHP file that handles the form functionality for the filters.
scripts/php/List.php: A PHP file that handles the list functionality for the product table.
Files and Components 📝
model.php: This file contains the following functions:

console_log($output): Logs a message to the browser console.
fetchXlxs($remote_filename_xlsx, $local_filename_xlsx): Fetches the XLSX file from the remote URL and saves it locally. If the local file already exists and was last modified today, it does not fetch the file again.
xlsxToCsv($local_filename_xlsx, $local_filename_csv): Converts the XLSX file to a CSV file. If the local CSV file already exists and was last modified today, it does not convert the file again.
getDateFromCsv($local_filename_csv): Extracts the date from the first line of the CSV file.
The script executes the following steps:

Fetch the XLSX file.
Convert the XLSX file to a CSV file.
Extract the date from the CSV file.
