<?php

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;

class articleViewModulController
{
    public function run()
    {
        $article = new ArticleView();
        $rest = new Rest();
        $settings = new Settings();
        $vendor = new Vendor();
        $adminContent = new AdminContent();

        $id = $rest->webhook(3);

        $show = $adminContent->getPostParam('show', $id);
        if ($show > 0) {
            $custom_data = array(
                'post_id' => $id,
                'title' => $article->getPostParam('name', $id) . ' | ' . $settings->get('title'),
                'meta' => array(
                    '<meta name="keywords" content="' . $article->getPostParam('tags', $id) . '" />',
                    '<meta name="description" content="' . $article->getPostParam('name', $id) . '" />',
                    '<meta content="' . $article->getPostParam('name', $id) . '" property="og:title" />',
                    '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                    '<meta content="article" property="og:type" />',
                    '<meta content="' . $article->getPostImage($id) . '" property="og:image" />',
                ),
            );
            include 'tpl.php';
        } else {
            include 'dnt-view/layouts/' . $vendor->getLayout() . '/modules/default/tpl.php';
        }
    }
}

$modul = new partneriModulController();
$modul->run();
