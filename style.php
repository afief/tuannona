<?php

$directory = "sass";

require "scss.inc.php";
scss_server::serveFrom($directory);

?>