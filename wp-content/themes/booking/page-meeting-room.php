<?php 
get_header('allpage');
$getBackgroundUnder = get_field('background_under', 'option');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 paddingBottom-40">
            <?php the_content();
            ?> 
			
        </div>
    </div>
</div>
<section class="page-attraction" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide']; ?>');" >
    <div class="container">
		 <div class="row">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $arg = new WP_Query(array(
            'post_type' => 'meetings',
            'posts_per_page' => -1,
            'paged' => $paged
        ));

        $num = 0;

        if ($arg->have_posts()) {
            while ($arg->have_posts()) {
                $arg->the_post();
                $content = strip_tags(get_the_content());
                ?>
		
			  <div class="col-md-4 col-sm-6">
        <div class="list_tourist">
                        <div class="_headerStyle-4">
                            <h2>
                                <?php the_title(); ?> 
                            </h2>
                            <p></p>
                        </div>
                        <div class="list_imgAtt product-gallery">                           
                            <?php $objGallery = get_field('gallery');
                            $gallery = get_field('gallery', $objGallery->ID);
                            $countImage = 1;
						 //var_dump($countImage);
                            foreach ($gallery as $item) {
                                $image = $item['url'];
                                if ($countImage == 1) { ?> 
                                 <a href="<?php echo $image;?>" title="<?php the_title();?>" class="item">
                                     <img width="<?php echo $item["sizes"]["image-single-width"];?>" height="<?php echo $item["sizes"]["image-single-height"];?>" class="img-responsive" src="<?php echo $image;?>" alt="<?php the_title();?>">

                                 </a>
                                 <?php
                             }else{
                                ?>
                                
                                <a href="<?php echo $image;?>" title="<?php the_title();?>"  class="item">
                                     <img width="<?php echo $item["sizes"]["image-single-width"];?>" height="<?php echo $item["sizes"]["image-single-height"];?>" class="img-responsive hidden" src="<?php echo $image;?>" alt="<?php the_title();?>">

                                 </a>
                                <?php }
                                $countImage++;
                                }
                            ?>
                        </div>
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
