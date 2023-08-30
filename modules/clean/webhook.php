<?php

class cleanModulController
{
    public function run()
    {
       (new DntLibrary\Base\Dnt)->render(__DIR__ . '/tpl.php');
    }
}

$modul = new cleanModulController();
$modul->run();
