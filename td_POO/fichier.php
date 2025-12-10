<?php
$dt = new DateTime();

echo $dt->format("d-m-Y\n");

$dt->add(new DateInterval('P10D'));
echo $dt->format("d-m-Y\n");