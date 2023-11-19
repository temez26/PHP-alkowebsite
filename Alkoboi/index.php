<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alkon hinnasto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="Cookies.js">
    </script>
</head>
<body class="bg-dark">

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="pt-3">
<?php
require("model.php");
?>
</div>
<?php

require_once("controller.php");
include 'Pagination.php';
require("form.php")
?>
<div class="ml-4 mr-4 bg-light">
    <?php
    echo $alkoProductTable;
    ?>

</div>
</body>
</html>
