<?php

use DntLibrary\Base\AdminContent;
use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\MultyLanguage;
use DntLibrary\Base\Vendor;

$vendor = new Vendor();
$frontend = new Frontend();
$multiLanguage = new MultyLanguage();
$adminContent = new AdminContent();
$article = new ArticleView();

include 'dnt-view/layouts/' . $vendor->getLayout() . '/tpl_functions.php';
$data = $frontend->get();
get_top($data);
$translate['citat_viac'] = $multiLanguage->translate($data, 'citat_viac', 'translate');
include 'dnt-view/layouts/' . $vendor->getLayout() . '/top.php';
?>

<!-- End header-v8 -->
<?php get_slider($data); ?>
<div class="container margin-bottom-40">
    <div class="col-md-12 homepage">
        <div class="masonry-box homepage-items">
            <div class="row">
<?php
$post_type = 'texty-na-homepage';
$query = "SELECT * FROM dnt_posts WHERE type = 'post' AND cat_id = '" . $adminContent->getCatId($post_type) . "' AND vendor_id = '" . $vendor->getId() . "'";
if ($db->num_rows($query) > 0) {
    foreach ($db->get_results($query) as $row) {
        ?>
                        <div class="blog-grid masonry-box-in col-3">
                            <h3><a href="<?php echo $article->getPostParam('name_url', $row['id_entity'], false, $row['name_url']); ?>">
                        <?php echo $article->getPostParam('name', $row['id_entity'], false, $row['name']); ?></a></h3>
                            <hr>
                            <p><?php echo $article->getPostParam('perex', $row['id_entity'], false, $row['perex']); ?></p>
                            <a class="r-more" href="<?php echo $article->getPostParam('name_url', $row['id_entity'], false, $row['name_url']); ?>"><?php echo $translate['citat_viac']; ?></a>
                        </div>
        <?php
    }
}
?>
            </div>
        </div>
        <!-- End Blog Grid -->
    </div>
</div>
</div>
<?php
get_footer($data);
get_bottom($data);
