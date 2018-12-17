<?php

header("Content-Type: text/csv; charset=utf-8");
header("X-Content-Type-Options: nosniff");
header("Content-Disposition: attachment;filename="aaa.csv";filename*=UTF-8''aaa.csv");


echo "Hello: ".$_GET["name"];
?>
