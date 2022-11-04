<?php

$path = preg_replace('/wp-content.*$/', '', __DIR__);

require_once($path . "wp-load.php");

echo "Work";

return json_encode("Ajax IS OK");

?>

