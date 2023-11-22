<form class="container d-flex justify-content-center align-items-center mt-3 col-12">
    <!-- Dropdown for selecting country -->
    <div class="form-group m-1">
        <select class="form-control" name='country' id='country'>
            <option value='sel'> --- valitse maa ---</option>
            <?php
            // Include external list of countries bottlesize and type
            include 'List.php';

            // Iterate through countries to populate the dropdown
            foreach ($countries as $country) {
                // Check if the country matches the selected value from the URL
                $selected = ($_GET['country'] == $country) ? "selected" : "";
                // Output each country as an option in the dropdown
                echo "<option value='" . htmlspecialchars($country) . "' " . $selected . ">" . htmlspecialchars($country) . "</option>";
            }
            ?>
        </select>
    </div>

    <!-- Input for minimum price -->
    <div class="form-group m-1">
        <input type="number" class="form-control" name="priceLow" id="priceLow" placeholder="Hinta Min"
            value="<?php echo isset($_GET['priceLow']) ? htmlspecialchars($_GET['priceLow']) : '' ?>">
    </div>

    <!-- Input for maximum price -->
    <div class="form-group m-1">
        <input type="number" class="form-control" name="priceHigh" id="priceHigh" placeholder="Hinta Max"
            value="<?php echo isset($_GET['priceHigh']) ? htmlspecialchars($_GET['priceHigh']) : '' ?>">
    </div>

    <!-- Input for minimum energy -->
    <div class="form-group m-1">
        <input type="number" class="form-control" name="energyLow" id="energyLow" placeholder="Energia Min"
            value="<?php echo isset($_GET['energyLow']) ? htmlspecialchars($_GET['energyLow']) : '' ?>">
    </div>

    <!-- Input for maximum energy -->
    <div class="form-group m-1">
        <input type="number" class="form-control" name="energyHigh" id="energyHigh" placeholder="Energia Max"
            value="<?php echo isset($_GET['energyHigh']) ? htmlspecialchars($_GET['energyHigh']) : '' ?>">
    </div>

    <!-- Dropdown for selecting bottle size -->
    <div class="form-group m-1">
        <select class="form-control" name='bottleSize' id='bottleSize'>
            <option value=''> ---pullonkoko --- </option>
            <?php
            // Iterate through bottle sizes to populate the dropdown
            foreach ($bottleSizes as $size) {
                // Check if the size matches the selected value from the URL
                $selected = ($_GET['bottleSize'] == $size) ? "selected" : "";
                // Output each size as an option in the dropdown
                echo "<option value='" . htmlspecialchars($size) . "' " . $selected . ">" . htmlspecialchars($size) . "</option>";
            }
            ?>
        </select>
    </div>

    <!-- Dropdown for selecting type -->
    <div class="form-group m-1">
        <select class="form-control" name='type' id='type'>
            <option value=''> --- valitse tyyppi --- </option>
            <?php
            // Iterate through types to populate the dropdown
            foreach ($types as $type) {
                // Check if the type matches the selected value from the URL
                $selected = ($_GET['type'] == $type) ? "selected" : "";
                // Output each type as an option in the dropdown
                echo "<option value='" . htmlspecialchars($type) . "' " . $selected . ">" . htmlspecialchars($type) . "</option>";
            }
            ?>
        </select>
    </div>
</form>