<?php
/** @var $cars  */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
      integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
  </head>
  <body>
  <div class="container">
    <?php include_once __DIR__ . '/../navigation.php'; ?>
    <table class="table mt-4">
      <tr>
        <th scope="col">Kennzeichen</th>
        <th scope="col">Hersteller</th>
        <th scope="col">Typ</th>
      </tr>
      <?php foreach ($cars as $car) : ?>
        <tr>
          <td><?= $car->getLicensePlate(); ?></td>
          <td><?= $car->getManufacturer(); ?></td>
          <td><?= $car->getType(); ?></td>
          <td><a href="index.php?area=car&action=delete&id=<?= $car->getId(); ?>">
            <button class="btn btn-danger">Löschen</button>
          </a></td>
          <td><a href="index.php?area=car&action=showEdit&id=<?= $car->getId(); ?>">
            <button class="btn btn-warning">Ändern</button>
          </a></td>
        </tr>
      <?php endforeach; ?>
    </table> 
  </div>
  </body>
</html>
