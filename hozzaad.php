<?php
/*
$a = 'A kutya';
$b = 'itt van elásva';
$c = $a . ' nem ' . $b;
echo $c; // A kutya nem itt van elásva
*/
include 'connect.php';
header('Content-Type: text/html; charset=utf-8');

$hibaKod = 0;
$konyvek = [];
$cim = $_POST['cim'];

echo $query = "
  INSERT INTO konyv SET cim = '$cim', ISBN = '" . $_POST['ISBN'] . "'";
if ($res = mysqli_query($dbc, $query)) {
  $konyvId = mysqli_insert_id($dbc);
}
/*
$query1 = "INSERT INTO szerzo SET nev = '";
$query2 = $_POST['szerzo'];
$query3 = "'";

$query = $query1 . $query2 . $query3;
*/
echo $query = "INSERT INTO szerzo SET nev = '" . $_POST['szerzo'] . "'";
if ($err = mysqli_error($dbc)) {
  echo $err;
}
if ($res = mysqli_query($dbc, $query)) {
  $szerzoId = mysqli_insert_id($dbc);
}


echo $query = "
  INSERT INTO konyvszerzo SET konyvid = $konyvId, szerzoid = $szerzoId
";
if ($res = mysqli_query($dbc, $query)) {

}


mysqli_close($dbc);

header('Location: index.php');
