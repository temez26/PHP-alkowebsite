<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alkon hinnasto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script>
        function setCookies() {
            let index = document.getElementById("country").selectedIndex;
            let selected = document.getElementById("country");
            if (index == 0) {
                document.cookie = "country= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
                window.location = "./index.php?page=0";
            } else {
                document.cookie = "country=" + selected.value;
                window.location = "./index.php?page=0&country=" + selected.value;
            }
        }

   
    </script>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require("model.php");
    require_once("controller.php");

    $alkoData = initModel();
    $filters = handleRequest();
    $alkoProductTable = generateView($alkoData, $filters, 'products');

    $rowsFound = count($alkoData);
    echo "<div id=\"tbl-header\" class=\"alert alert-success\" role=\"\">Alkon hinnasto $priceListDate (Total items $rowsFound)</div>";

    $currpage = isset($filters['PAGE']) ? $filters['PAGE'] : 0;
    $prevpage = $currpage > $filters['LIMIT'] ? $currpage - $filters['LIMIT'] : 0;
    $nextpage = $currpage + $filters['LIMIT'];
    $country = isset($_COOKIE['country']) ? "&country=" . $_COOKIE['country'] : "";
    
    echo "<input type=button onClick=\"location.href='./index.php?page=" . $prevpage . $country . "'\" value='prev'>";
    echo "<input type=button onClick=\"location.href='./index.php?page=" . $nextpage . $country . "'\" value='next'>";
    echo "<input type=button onClick=setCookies() value='set filter'>";

    ?>
    <form>
        <select name='country' id='country'>
            <option value='sel'>--- valitse maa ---</option>
            <?php
            $countries = [
                'Argentiina', 'Armenia', 'Australia', 'Belgia', 'Bulgaria', 'Chile', 'Englanti', 'Espanja', 'Etelä-Afrikka',
                'Georgia', 'Israel', 'Italia', 'Itävalta', 'Kosovo', 'Kreikka', 'Kroatia', 'Libanon', 'Moldova',
                'Muu alkuperämaa', 'Peru', 'Pohjois-Makedonia', 'Portugali', 'Ranska', 'Ruotsi', 'Saksa', 'Serbia',
                'Slovakia', 'Slovenia', 'Tsekki', 'Turkki', 'Ukraina', 'Unkari', 'Uruguay', 'Uusi-Seelanti', 'Yhdysvallat',
                'Euroopan unioni', 'Sveitsi', 'Intia', 'Japani', 'Kanada', 'Kypros', 'Luxemburg', 'Romania', 'Suomi',
                'Alkuperämaa vaihtelee', 'Barbados', 'Bermuda', 'Dominikaaninen tasavalta', 'Grenada', 'Guatemala', 'Guyana',
                'Hollanti', 'Jamaika', 'Kolumbia', 'Kuuba', 'Latvia', 'Liettua', 'Mauritius', 'Nicaragua', 'Panama',
                'Puerto Rico', 'Skotlanti', 'Tanska', 'Trinidad ja Tobago', 'Venezuela', 'Viro', 'Irlanti', 'Kiina',
                'Meksiko', 'Wales', 'Islanti', 'Norja', 'Puola', 'Thaimaa', 'Etelä-Korea', 'Brasilia'
                // Add more countries here...
            ];

            foreach ($countries as $country) {
                echo "<option value='" . htmlspecialchars($country) . "'>" . htmlspecialchars($country) . "</option>";
            }
            ?>
        </select>
        <label for="price">Filter by price:</label>
    <input type="number" id="price" name="price" min="0" placeholder="Enter max price">
    <input type="submit" value="Apply">
    </form>

    

    <?php
    echo $alkoProductTable;
    ?>
</body>
</html>
