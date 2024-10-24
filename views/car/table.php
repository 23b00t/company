<?php
/** @var Car[] $cars  */
?>

<table class="table mt-4">
  <tr>
    <th scope="col">Kennzeichen</th>
    <th scope="col">Hersteller</th>
    <th scope="col">Typ</th>
    <th scope="col">Löschen</th>
    <th scope="col">Ändern</th>
  </tr>
  <?php foreach ($cars as $car) : ?>
    <tr>
      <td><?= $car->getLicensePlate(); ?></td>
      <td><?= $car->getManufacturer(); ?></td>
      <td><?= $car->getType(); ?></td>
      <td><a href="index.php?area=car&action=delete&id=<?= $car->getId(); ?>">
        <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
      </a></td>
      <td><a href="index.php?area=car&action=showForm&id=<?= $car->getId(); ?>">
        <button class="btn btn-outline-warning"><i class="fa-solid fa-pencil"></i></button>
      </a></td>
    </tr>
  <?php endforeach; ?>
</table> 
