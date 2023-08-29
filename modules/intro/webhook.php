<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;

class introModulController
{
    public function run()
    {
        $rest = new Rest();
        $db = new DB();
        if ($rest->webhook(2)) { //o jeden vyssi webhook ako maximalnz mozny
            $rest->loadDefault();
        } else {
            include 'tpl.php';
        }
    }
}

$modul = new introModulController();
$modul->run();
