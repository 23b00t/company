<?php
/** @var $employees  */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
      integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
  <body>
  <div class="container">
    <?php include_once __DIR__ . '/../navigation.php'; ?>
    <table class="table mt-4">
      <tr>
        <th scope="col">Vorname</th>
        <th scope="col">Nachname</th>
        <th scope="col">Geschlecht</th>
        <th scope="col">Monatslohn</th>
        <th scope="col">Löschen</th>
        <th scope="col">Ändern</th>
      </tr>
      <?php foreach ($employees as $employee) : ?>
        <tr>
          <td><?= $employee->getFirstName(); ?></td>
          <td><?= $employee->getLastName(); ?></td>
          <td><?= $employee->getGender(); ?></td>
          <td><?= $employee->getSalary(); ?></td>
          <td><a href="index.php?area=employee&action=delete&id=<?= $employee->getId(); ?>">
            <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
          </a></td>
          <td><a href="index.php?area=employee&action=showForm&id=<?= $employee->getId(); ?>">
            <button class="btn btn-outline-warning"><i class="fa-solid fa-pencil"></i></button>
          </a></td>
        </tr>
      <?php endforeach; ?>
    </table> 
  </div>
  </body>
</html>