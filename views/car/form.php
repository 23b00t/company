<?php
/** @var firma\index $car  */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autoformular</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' 
      integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
  </head>
  <body>
    <div>
      <?php include_once __DIR__ . '/../navigation.php'; ?>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <h2 class="text-center mt-5">Auto</h2>
          <!-- POST an index.php -->
          <form action="index.php" method="POST">
            <div class="form-group">
              <label for="licensePlate">Kennezeichen</label>
              <input type="text" class="form-control" id="licensePlate" name="licensePlate" required 
                value="<?= $car->getLicensePlate(); ?>">
            </div>
            <div class="form-group">
              <label for="manufacturer">Hersteller</label>
              <input type="text" class="form-control" id="manufacturer" name="manufacturer" required 
                value="<?= $car->getManufacturer(); ?>">
            </div>

            <div class="form-group">
              <label for="type">Typ</label>
              <input type="text" class="form-control" id="type" name="type" required 
                value="<?= $car->getType(); ?>">
            </div>

            <input type="hidden" name="area" value="car">

            <!-- Set action in hidden field -->
            <input type="hidden" name="action" value="<?= $car->getId() === null ? 'insert' : 'update'; ?>">

            <!-- Set id in hidden field -->
            <input type="hidden" name="id" value="<?= $car->getId(); ?>"

            <div class="form-group">
              <!-- Submitt button -->
              <button type="submit" class="btn btn-primary btn-block mt-3">Speichern</button>
              <!-- Reset button -->
              <button type="reset" class="btn btn-outline-warning btn-block mt-3">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
