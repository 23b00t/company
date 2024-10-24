<?php

/**
 * @var Rental $rental
 * @var string $action
 */

$rentalExists = isset($rental) && $rental instanceof Rental;
?>

<div class="row justify-content-center">
  <div class="col-md-4">
    <h2 class="text-center mt-5">Mietvorgang</h2>
    <form action="index.php" method="POST">
      <!-- Employee Dropdown -->
      <div class="form-group">
        <label for="employeeId">Mitarbeiter</label>
        <?= $rentalExists ? $rental->getEmployeePulldown() : (new Rental())->getEmployeePulldown(); ?>
      </div>

      <!-- Car Dropdown -->
      <div class="form-group">
        <label for="carId">Fahrzeug</label>
        <?= $rentalExists ? $rental->getCarPulldown() : (new Rental())->getCarPulldown(); ?>
      </div>

      <!-- Rental From -->
      <div class="form-group">
        <label for="rentalFrom">Mietbeginn</label>
        <input type="datetime-local" class="form-control" id="rentalFrom" name="rentalFrom" required 
          value="<?= $rentalExists ? $rental->getRentalFrom() : ''; ?>">
      </div>

      <!-- Rental To -->
      <div class="form-group">
        <label for="rentalTo">Mietende</label>
        <input type="datetime-local" class="form-control" id="rentalTo" name="rentalTo"
          value="<?= $rentalExists ? $rental->getRentalTo() : ''; ?>">
      </div>

      <!-- Set area in hidden field -->
      <input type="hidden" name="area" value="rental">

      <!-- Set action in hidden field -->
      <input type="hidden" name="action" value="<?= $action; ?>">

      <!-- Set id in hidden field -->
      <input type="hidden" name="id" value="<?= $rentalExists ? $rental->getId() : ''; ?>">

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block mt-3">Speichern</button>
        <button type="reset" class="btn btn-outline-warning btn-block mt-3">Reset</button>
      </div>
    </form>
  </div>
</div>
