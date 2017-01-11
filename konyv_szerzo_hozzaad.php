<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<form method="post" action="hozzaad.php">
  <table>
    <tr>
      <td><label for="cim">Könyv teljes címe:</label></td>
      <td><input type="text" id="cim" name="cim" length="50"></td>
    </tr>
    <tr>
      <td><label for="ISBN">Könyv ISBN száma:</label></td>
      <td><input type="text" id="ISBN" name="ISBN" length="50"></td>
    </tr>
    <tr>
      <td><label for="ISBN">Könyv szerzője:</label></td>
      <td><input type="text" id="szerzo" name="szerzo" length="50"></td>
    </tr>
  </table>

  <input type="submit" value="Könyv és szerző hozzáadása">
</form>
</body>
</html>
