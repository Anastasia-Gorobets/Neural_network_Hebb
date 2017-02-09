<?php
require_once 'src/Neural.php';
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x3 = $_POST['x3'];
$x4 = $_POST['x4'];
$neural = new Source\Neural($x1, $x2, $x3, $x4);
$neural->study();
//проверка условий останова
$neural->checkStop();
$neural->printW();
if ($_POST['ident'] == true) {
    $xi = $_POST['xi'];
    echo $neural->checkSymbol($xi);
}






