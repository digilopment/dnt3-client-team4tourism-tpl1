<?php

class defaultModulController
{

    public function run()
    {
        header("HTTP/1.0 404 Not Found");
        include "tpl.php";
    }

}

$modul = new defaultModulController();
$modul->run();
