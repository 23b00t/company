<?php
/** @var $rentals */
/** @var $employees */
/** @var $cars */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Liste</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
      integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
  <body>
  <div class="container">
    <?php include_once __DIR__ . '/../navigation.php'; ?>
    <table class="table mt-4">
      <tr>
        <th scope="col">Mitarbeiter</th>
        <th scope="col">Fahrzeug</th>
        <th scope="col">Mietbeginn</th>
        <th scope="col">Mietende</th>
        <th scope="col">Löschen</th>
        <th scope="col">Ändern</th>
      </tr>
      <?php foreach ($rentals as $rental) : ?>
        <tr>
            <?php
              $employee = array_filter($employees, fn ($e) => $e->getId() === $rental->getEmployeeId())[0] ?? null;
              $car = array_filter($cars, fn ($c) => $c->getId() === $rental->getCarId())[0] ?? null;
            ?>
          <td><?= $employee ? $employee->getLastName() . ', ' . $employee->getFirstName() : 'Unbekannt'; ?></td>
          <td><?= $car ? $car->getLicensePlate() : 'Unbekannt'; ?></td>
          <td><?= $rental->getRentalFrom(); ?></td>
          <td><?= $rental->getRentalTo(); ?></td>
          <td><a href="index.php?area=rental&action=delete&id=<?= $rental->getId(); ?>">
            <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
          </a></td>
          <td><a href="index.php?area=rental&action=showForm&id=<?= $rental->getId(); ?>">
            <button class="btn btn-outline-warning"><i class="fa-solid fa-pencil"></i></button>
          </a></td>
        </tr>
      <?php endforeach; ?>
    </table> 
  </div>
  </body>
</html>
