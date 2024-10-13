<?php
/** @var firma\index $employees  */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste</title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <?php include_once __DIR__ . '/navigation.php'; ?>
    <table>
      <tr>
      <th>Vorname</th>
      <th>Nachname</th>
      <th>Geschlecht</th>
      <th>Monatslohn</th>
      <th>Löschen</th>
      <th>Ändern</th>
      </tr>
      <?php foreach ($employees as $employee) : ?>
        <tr>
          <td><?= $employee->getFirstName(); ?></td>
          <td><?= $employee->getLastName(); ?></td>
          <td><?= $employee->getGender(); ?></td>
          <td><?= $employee->getSalary(); ?></td>
          <td><a href="index.php?action=delete&id=<?= $employee->getId(); ?>"><button>Löschen</button></a></td>
          <td><a href="index.php?action=edit&id=<?= $employee->getId(); ?>"><button>Ändern</button></a></td>
        </tr>
      <?php endforeach; ?>
    </table> 
  </body>
</html>
