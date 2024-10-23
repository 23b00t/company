<?php
/** @var $employees  */
?>

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
