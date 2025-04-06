<?php

// Start by loading all the files we'll need
require_once __DIR__ . '/classmap.php';

// And handle the incoming request
try
{
    (new Web())->handle();    
}
catch(Exception $ex)
{
    // Our last line of defense: The "system error page":
    $html = file_get_contents(__DIR__ . '/views/exception.html');
    $html = str_replace('%%EXCEPTION%%', htmlspecialchars($ex->getMessage(), ENT_QUOTES, 'UTF-8'), $html);
    echo $html;
}

