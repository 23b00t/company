<?php

/**
 * @var Car $car
 * @var string $action
 */

// Check if $car exists and is an instance of Car (edit route)
$carExists = isset($car) && $car instanceof Car;
?>

<div class="row justify-content-center">
  <div class="col-md-4">
    <h2 class="text-center mt-5">Auto</h2>
    <!-- POST to index.php -->
    <form action="index.php" method="POST">
      <!-- Input fields for License plate, manufacturer and type -->
      <div class="form-group">
        <label for="licensePlate">Kennzeichen</label>
        <input type="text" class="form-control" id="licensePlate" name="licensePlate" required 
          value="<?= $carExists ? $car->getLicensePlate() : ''; ?>">
      </div>
      <div class="form-group">
        <label for="manufacturer">Hersteller</label>
        <input type="text" class="form-control" id="manufacturer" name="manufacturer" required 
          value="<?= $carExists ? $car->getManufacturer() : ''; ?>">
      </div>
      <div class="form-group">
        <label for="type">Typ</label>
        <input type="text" class="form-control" id="type" name="type" required 
          value="<?= $carExists ? $car->getType() : ''; ?>">
      </div>

      <!-- Set area in hidden field -->
      <input type="hidden" name="area" value="car">

      <!-- Set action in hidden field -->
      <input type="hidden" name="action" value="<?= $action; ?>">

      <!-- Set id in hidden field -->
      <input type="hidden" name="id" value="<?= $carExists ? $car->getId() : ''; ?>"

      <div class="form-group">
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mt-3">Speichern</button>
        <!-- Reset button -->
        <button type="reset" class="btn btn-outline-warning btn-block mt-3">Reset</button>
      </div>
    </form>
  </div>
</div>
