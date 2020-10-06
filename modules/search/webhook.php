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

        include "dnt-view/layouts/" . Vendor::getLayout() . "/modules/article_list/tpl.php";
    }

}

searchModulController::run();
