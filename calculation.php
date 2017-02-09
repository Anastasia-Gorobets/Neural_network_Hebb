<?php
require_once 'Neural.php';
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x3 = $_POST['x3'];
$x4 = $_POST['x4'];
$neural = new Neural($x1, $x2, $x3, $x4);
$neural->study();
//проверка условий останова
$neural->checkStop();
$neural->printW();
if ($_POST['ident'] == true) {
    $xi = $_POST['xi'];
    $neural->checkSymbol($xi);
}






