<?php
 /*
Template Name: Template CSR
 */
get_header('allpage');
$getBackgroundUnder = get_field('background_under', 'option');
?>
<div class="container">
</div>
<section class="page-attraction" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide']; ?>');">
    <div class="container">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $arg = new WP_Query(array(
                'post_type' => 'csr',
                'posts_per_page' => -1,
                'paged' => $paged
            ));

            $num = 0;

            if ($arg->have_posts()) {
                while ($arg->have_posts()) {
                    $arg->the_post();
                    $content = strip_tags(get_the_title());
                    ?>

            <div class="col-md-4 col-sm-6">
                <div class="list_tourist">
                    <a href="<?php the_permalink(); ?>">
                        <div class="list_imgAtt list_csr" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">

                        </div>
                        <div class="detail_csr">
                            <p>
                                <?php echo textexcerpt($content, 100); ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <?php

        }

        if (function_exists(custom_pagination)) {
            custom_pagination($arg->max_num_pages, "", $paged);
        }

        wp_reset_query();
    }
    ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 paddingBottom-40">
                <?php 
                echo get_field('table');
                ?>

            </div>
        </div>
    </div>
</section>
<?php
get_footer(); ?> 