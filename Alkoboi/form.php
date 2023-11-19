<form class="container d-flex justify-content-center align-items-center">
    <div class="form-group">
       
        <select class="form-control" name='country' id='country'>
            <option value='sel'> --- valitse maa ---</option>
            <?php
            include 'List.php';

            foreach ($countries as $country) {
                echo "<option value='" . htmlspecialchars($country) . "'>" . htmlspecialchars($country) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
       
        <input type="number" class="form-control" name="priceLow" id="priceLow" placeholder="Hinta Min">
    </div>

    <div class="form-group">
       
        <input type="number" class="form-control" name="priceHigh" id="priceHigh" placeholder="Hinta Max">
    </div>

    <div class="form-group">
       
        <input type="number" class="form-control" name="energyLow" id="energyLow" placeholder="Energia Min">
    </div>

    <div class="form-group">
      
        <input type="number" class="form-control" name="energyHigh" id="energyHigh" placeholder="Energia High">
    </div>

    <div class="form-group">
        
        <select class="form-control" name='bottleSize' id='bottleSize'>
            <option value=''> ---pullonkoko --- </option>
            <?php
            foreach ($bottleSizes as $size) {
                echo "<option value='" . htmlspecialchars($size) . "'>" . htmlspecialchars($size) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
       
        <select class="form-control" name='type' id='type'>
            <option value=''>   --- valitse tyyppi --- </option>
            <?php
            foreach ($types as $type) {
                echo "<option value='" . htmlspecialchars($type) . "'>" . htmlspecialchars($type) . "</option>";
            }
            ?>
        </select>
    </div>
</form>
