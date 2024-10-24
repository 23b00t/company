<?php

/**
 * @var Rental[] $rentals
 * @var Employee[] $employees
 * @var Car[] $cars
 */
?>

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
          $employee = array_values(
              array_filter($employees, fn ($e) => $e->getId() === $rental->getEmployeeId())
          )[0] ?? null;
          $car = array_values(array_filter($cars, fn ($c) => $c->getId() === $rental->getCarId()))[0] ?? null;
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
