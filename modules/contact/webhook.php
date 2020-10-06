<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;

class contactModulController
{

    public function run()
    {
        $article = new ArticleView;
        $custom_data = array(
            "title" => $article->getPostParam("name", $article->getStaticId()) . " | " . Settings::get("title"),
        );
        $data = Frontend::get($custom_data);
        $rest = new Rest;
        if ($rest->webhook(2)) { //o jeden vyssi webhook ako maximalnz mozny
            $rest->loadDefault();
        } else {
            include "tpl.php";
        }
    }

}

contactModulController::run();
