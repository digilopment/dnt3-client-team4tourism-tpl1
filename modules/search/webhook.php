<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class searchModulController
{

    public function run()
    {
        $rest = new Rest;
        $db = new DB;
        $vendor = new Vendor;

        include "dnt-view/layouts/" . $vendor->getLayout() . "/modules/article_list/tpl.php";
    }

}

$modul = new searchModulController();
$modul->run();
