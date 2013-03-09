<?php
function __autoload($className) {
    $filename = system.'libs/'.$className . ".php";
    if (is_readable($filename)) {
        require_once $filename;
    }
}
?>
