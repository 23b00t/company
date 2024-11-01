<?php

/**
 * @var string $area
 * @var object $controller
 * @var object $e
 */
?>

<!DOCTYPE html>
<html lang="de-DE">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="de-DE">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mitarbeiter Portal</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
      integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
  <body>
    <?php if (isset($e)) : ?>
        <p>Sorry, es ist ein Fehler aufgetreten, der Administrator ist informiert!</p>
    <?php else : ?>
        <?php include __DIR__ . '/navbar.html'; ?>
        <div class="container-md">
          <?php include __DIR__ . '/' . $area . '/' . $controller->getView() . '.php'; ?>
        </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
  </body>
</html>
