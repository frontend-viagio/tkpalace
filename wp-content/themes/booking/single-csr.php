<?php
get_header('allpage');
$getBackgroundUnder = get_field('background_under', 'option');
?>
<section class="section-attractionsDetail paddingBottom-80" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide']; ?>');">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>

        <div class="row">
            <div class="col-md-12">
                <div class="box-detail">
                    <div class="detail singledetail">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
        </div>

        <?php

    }
}
?>

    </div>
</section>
<!-- End .section-roomDetail -->
<?php
get_footer();

?> 