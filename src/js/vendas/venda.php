<?php
require_once ("../../classes/venda/".$_POST['classe']."Strategy.php");
$classe = $_POST['classe'] ?? $_GET['classe'];
$Class = new $classe();

$method = $_POST['Method'] ?? $_GET['Method'];
$Class->$method();