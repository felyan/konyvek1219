<?php
header('Content-Type: text/html; charset=utf-8');

$hibaKod = 0;
$konyvek = [];
$tipus = $_POST["tipus"];
$kifejezes = $_POST["kifejezes"];

if (empty($tipus) || empty($kifejezes)) {
  $hibaKod = 1;
}


if (empty($tipus) || empty($kifejezes)) {

  echo "Kérem adja meg a keresési feltételeket!";
  exit;
}

include 'connect.php';

if ($tipus == "szerzo") {
  $query = "
	SELECT * FROM szerzo
	JOIN konyvszerzo ksz ON szerzo.szerzoid=ksz.szerzoid
	JOIN konyv ON ksz.konyvid=konyv.konyvid
WHERE nev LIKE '%$kifejezes%'
";
} else {
  $query = "
	SELECT * FROM konyv
JOIN konyvszerzo ksz ON konyv.konyvid = ksz.konyvid
JOIN szerzo ON szerzo.szerzoid = ksz.szerzoid
WHERE $tipus LIKE '%$kifejezes%'
";
}
echo $query;
if ($eredmeny = mysqli_query($dbc, $query)) {
  $talalatok_szama = mysqli_num_rows($eredmeny);

  if ($talalatok_szama >= 1) {
    while ($sor = mysqli_fetch_array($eredmeny)) {
      $konyvek [] = $sor;
    }
  } else {
    $hibaKod = 3;
  }
  mysqli_free_result($eredmeny);
} else {
  $hibaKod = 2;
}

mysqli_close($dbc);
include('keres_konyv.php');
?>
