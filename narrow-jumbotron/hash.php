<?php
include "init.php";
$obj = new base_class;

if ($obj->Normal_Query("SELECT name FROM users")) {
  $rows = $obj->fetch_all();
  foreach ($rows as $results) :
    echo $results->name;
  endforeach;
}
?>