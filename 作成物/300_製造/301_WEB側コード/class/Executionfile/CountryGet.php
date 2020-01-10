<?php
require_once '../Controll/setting/cource/CourceGet.php';

var_dump($_POST['country']);
$class = new CourceGet();
$ans = $class->school_get($_POST['country']);

print_r(implode('',$ans));
return $ans;
