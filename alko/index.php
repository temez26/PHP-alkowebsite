<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alkon hinnasto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/styles.css">
    <!-- Include Cookies.js -->
    <script src="scripts/js/Cookies.js"></script>
</head>
<body class="bg-dark ">

<?php
// Display any PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED);


?>
<div class="pt-3">
<?php
// Include the model.php file
require("model.php");

?>
</div>

<?php
// Include the controller.php file
require_once("controller.php");
// Include the Pagination.php file
include 'scripts/php/Pagination.php';
// Include the form.php file
require("scripts/php/Form.php")
?>

<div class="ml-4 mr-4 bg-light ">
    <?php
    // Display the Alko product table
    echo $alkoProductTable;
    ?>
</div>

</body>
</html>
