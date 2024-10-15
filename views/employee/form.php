<?php
/**
 * @var $employee
 * @var $action
 */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mitarbeiterformular</title>
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
          <h2 class="text-center mt-5">Mitarbeiter</h2>
          <!-- POST to index.php -->
          <form action="index.php" method="POST">
            <!-- Name and first name  -->
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

            <!-- Gender checkboxes -->
            <div class="mb-2 mt-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="w" 
                  <?= !preg_match('/^w.*/', $employee->getGender()) ?: 'checked' ?>>
                <label class="form-check-label" for="inlineRadio1">weiblich</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="m"
                  <?= !preg_match('/^m.*/', $employee->getGender()) ?: 'checked' ?>>
                <label class="form-check-label" for="inlineRadio2">männlich</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="d"
                  <?= !preg_match('/^d.*/', $employee->getGender()) ?: 'checked' ?>>
                <label class="form-check-label" for="inlineRadio3">divers</label>
              </div>
            </div>

            <!-- Salary -->
            <div class="form-group">
              <label for="salary">Monatslohn</label>
              <input type="number" step="0.01" class="form-control" id="salary" name="salary" 
                value="<?= $employee->getSalary() ?? ''; ?>">
            </div>

            <!-- Set area in hidden field -->
            <input type="hidden" name="area" value="employee">

            <!-- Set action in hidden field -->
            <input type="hidden" name="action" value="<?= $action; ?>">

            <!-- Set id in hidden field -->
            <input type="hidden" name="id" value="<?= $employee->getId(); ?>"

            <div class="form-group">
              <!-- Submit button -->
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
