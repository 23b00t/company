<?php

/**
 * @var Rental[] $rentals
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
      <td><?= $rental->getName(); ?> </td>
      <td><?= $rental->getLicensePlate(); ?> </td>
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
