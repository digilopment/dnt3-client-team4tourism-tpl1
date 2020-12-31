<?php

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;

$frontend = new Frontend();
$dnt = new Dnt();

$data = $frontend->get();
$postData = $frontend-->getDeafult($data, "article");
if ($dnt->not_html($postData['perex'])) {
    echo $dnt->not_html($postData['perex']);
} else {
    echo $postData['content'];
}
?>