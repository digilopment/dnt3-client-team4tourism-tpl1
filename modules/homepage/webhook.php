<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;

class homepageModulController
{
    public function run()
    {
        $rest = new Rest();
        $db = new DB();
        include 'tpl.php';
    }
}


$modul = new partneriModulController();
$modul->run();
