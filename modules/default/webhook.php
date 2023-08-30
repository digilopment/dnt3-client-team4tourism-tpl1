<?php

class defaultModulController
{
    public function run()
    {
        header('HTTP/1.0 404 Not Found');
        (new DntLibrary\Base\Dnt)->render(__DIR__ . '/tpl.php');
    }
}

$modul = new defaultModulController();
$modul->run();
