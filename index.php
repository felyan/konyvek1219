<!doctype html>
<html>
<head><title>Könyvek</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<?php include "header.php"; ?>
<main>
  <?php include (isset($_GET['tartalom']) ? $_GET['tartalom'] : 'kezdo') . ".php"; ?>
</main>
</body>
</html>
