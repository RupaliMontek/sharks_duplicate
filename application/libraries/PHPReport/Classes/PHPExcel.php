<?php
set_include_path(implode(PATH_SEPARATOR, [
    realpath(__DIR__ . '/Classes'), // assuming Classes is in the same directory as this script
    get_include_path()
]));

require_once 'PHPExcel.php';
?>