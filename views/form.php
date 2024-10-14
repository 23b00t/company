<?php
/** @var firma\index $employee  */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' 
      integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
  </head>
  <body>
    <div>
      <?php include_once __DIR__ . '/navigation.php'; ?>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <h2 class="text-center mt-5">Mitarbeiter</h2>
          <!-- POST an index.php -->
          <form action="index.php" method="POST">
            <!-- Name und Vorname  -->
            <div class="form-group">
              <label for="firstName">Vorname</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required 
                value="<?= $employee->getFirstName(); ?>">
            </div>
            <div class="form-group">
              <label for="lastName">Nachname</label>
              <input type="text" class="form-control" id="lastName" name="lastName" required 
                value="<?= $employee->getLastName(); ?>">
            </div>

            <!-- Geschlechtscheckboxen -->
            <div class="mb-2 mt-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female" 
                  <?= !preg_match('/^w.*/', $employee->getGender()) ?: 'checked' ?>>
                <label class="form-check-label" for="inlineRadio1">weiblich</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="male"
                  <?= !preg_match('/^m.*/', $employee->getGender()) ?: 'checked' ?>>
                <label class="form-check-label" for="inlineRadio2">männlich</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="divers"
                  <?= !preg_match('/^d.*/', $employee->getGender()) ?: 'checked' ?>>
                <label class="form-check-label" for="inlineRadio3">divers</label>
              </div>
            </div>

            <!-- Monataslohn -->
            <div class="form-group">
              <label for="salary">Monataslohn</label>
              <input type="number" step="0.01" class="form-control" id="salary" name="salary" 
                value="<?= $employee->getSalary() ?? ''; ?>">
            </div>

            <!-- Set action in hidden field -->
            <input type="hidden" name="action" value="insert">

            <!-- Set id in hidden field -->
            <input type="hidden" name="id" value="<?= $employee->getId(); ?>"

            <div class="form-group">
              <!-- Submitt button -->
              <button type="submit" class="btn btn-primary btn-block mt-3">Speichern</button>
              <!-- Reset button -->
              <a href="index.php?action=showForm" >
                <button class="btn btn-outline-warning btn-block mt-3">Reset</button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
