<?php
$dbc = mysqli_connect('localhost', 'root', 'password', "konyv");
if (mysqli_connect_error()) {
  echo "Hiba a kapcsolódás során";
  include "kereses_konyv.php";
  exit;
}
mysqli_query($dbc, "set names utf8");
