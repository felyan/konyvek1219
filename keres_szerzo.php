<?php
//var_dump($_GET);
//var_dump($_POST);

if (isset($_POST["tipus"])) {
  $tipus = $_POST["tipus"];
} elseif (isset($_GET["tipus"])) {
  $tipus = $_GET["tipus"];
}

//var_dump($tipus);
?>
<h2>Kérem válasszon az alábbiak közül</h2>
<form action="index.php?tartalom=eredmeny_konyv" method="post">

  <select name="tipus">
    <option value=""></option>
    <option value="cim" <?php if ($tipus == 'cim') {
      echo 'selected';
    } ?>>Könyv címe alapján
    </option>
    <option value="ISBN" <?= $tipus == 'ISBN' ? 'selected' : "" ?>>ISBN alapján</option>
    <option value="szerzo" <?= $tipus == 'szerzo' ? 'selected' : "" ?>>Szerző alapján</option>
  </select>
  <br>
  Írja be a keresendő kifejezést: <br/>
  <input name="kifejezes" type="text" size="40" value="<?php echo $_POST["kifejezes"] ?>"/>
  <br/>
  <input type="submit" name="kuldes" value="Keresés"/>
</form>


<?php if ($hibaKod) {
  switch ($hibaKod) {
    case 1:
      echo 'Töltse ki az űrlapot!';
      break;
    case 2:
      echo 'Nem sikerült csatlakozni!';
      break;
    case 3:
      echo 'Nincs eredmény';
      break;
  }
} ?>

<?php if (!empty($konyvek)): ?>


  <table>
    <thead>
    <tr>
      <th>Könyv címe</th>
      <th>ISBN száma</th>
      <th>Szerző neve</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($konyvek as $kulcs => $konyv): ?>

      <tr>
        <td><?php echo $konyv["cim"] ?></td>
        <td><?php echo $konyv["ISBN"] ?></td>
        <td><?= $konyv["nev"] ?></td>
      </tr>

    <?php endforeach; ?>

    </tbody>
  </table>
<?php endif; ?>

<div>
  <img src="keres_<?= $tipus == 'szerzo' ? 'szerzo' : 'konyv' ?>.jpg" alt="" class="p1">
</div>
