<?php

use DntLibrary\Base\ArticleList;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Image;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Webhook;

$frontend = new Frontend();
$vendor = new Vendor();
$dnt = new Dnt();
$image = new Image();
$articleList = new ArticleList();

include 'dnt-view/layouts/' . $vendor->getLayout() . '/tpl_functions.php';
$data = $frontend->get();
//$data = false;
get_top($data);
include 'dnt-view/layouts/' . $vendor->getLayout() . '/top.php';

$rest = new Rest();
$db = new DB();
$articleView = new ArticleView();
$webhook = new Webhook();
?>
<div class="margin-bottom-60"></div>
<div class="container panel panel-primary dnt-poll">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="blog-grid margin-bottom-30">
                    <h2 class="title-v4"><?php echo $data['article']['name']; ?></h2>
                    <?php
                    $imgMeta = false;
                    $nameMeta = false;
                    $contentMeta = false;
                    $query = $articleList->query();
                    if ($db->num_rows($query) > 0) {
                        foreach ($db->get_results($query) as $row) {
                            $img = $image->getPostImage($row['id'], 'dnt_posts');
                            $content = $row['content'];
                            $perex = $row['perex'];
                            $name = $row['name'];
                            $url = $articleView->detailUrl($row['cat_name_url'], $row['id'], $row['name_url']);

                            $metaArr = $articleView->getPostsMeta($row['id'], $row['service']);
                            foreach ($metaArr as $meta) {
                                if ($meta['content_type'] == 'image') {
                                    $imgMeta = $image->getFileImage($meta['value']);
                                    break;
                                }
                            }
                            foreach ($metaArr as $meta) {
                                if ($meta['content_type'] == 'text') {
                                    $nameMeta = $meta['value'];
                                    break;
                                }
                            }
                            foreach ($metaArr as $meta) {
                                if ($meta['content_type'] == 'content') {
                                    $contentMeta = $meta['value'];
                                    break;
                                }
                            }

                            if ($row['service']) {
                                $modul = $webhook->getSitemapModules($row['service']);
                                $url = WWW_PATH . $modul[0];
                            }

                            if ($dnt->not_html($content) == '') {
                                $content = $contentMeta;
                            }
                            if ($img == '') {
                                $img = $imgMeta;
                            }
                            if ($dnt->not_html($name) == '') {
                                $name = $nameMeta;
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-4" style="margin-top: 10px;">
                                    <a href="<?php echo $url; ?>" class=""><img src="<?php echo $img; ?>" class="img-responsive"></a>
                                </div>
                                <div class="col-sm-8">
                                    <h3 class="title"><a href="<?php echo $url; ?>"><?php echo $name; ?></a></h3>
                                    <p class="text-muted"><span class="glyphicon glyphicon-lock"></span> <?php echo $perex ?></p>
                                    <p><?php echo $content; ?></p>
                                    <?php
                                    /* <p class="text-muted">powered by <a href="" target="_blank"><?php echo $data['article']['name']?></a></p> */
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <?php
                        }
                    } else {
                        ?>
                        <h3 class="title"><?php echo $data['article']['perex']; ?></h3>
                        <?php echo $data['article']['content']; ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php col_right($data); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer($data);
get_bottom($data);
