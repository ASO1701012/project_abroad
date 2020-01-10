<?php

require_once '../Controll/setting/cource/CourceGet.php';

$class = new CourceGet();
$ans = $class->body_data_all_get();

print_r($ans);
return $ans;