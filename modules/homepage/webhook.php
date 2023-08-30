<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;

class homepageModulController
{
    public function run()
    {
        $rest = new Rest();
        $db = new DB();
        (new DntLibrary\Base\Dnt)->render(__DIR__ . '/tpl.php');
    }
}


$modul = new partneriModulController();
$modul->run();
