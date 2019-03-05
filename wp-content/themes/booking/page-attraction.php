<?php 
get_header('allpage');
$getBackgroundUnder = get_field('background_under','option');
?>

<section class="page-attraction" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide'];?>');" >
    <div class="container">
            <div class="tourist_attraction">
             <?php
            $attracList = new WP_Query(array(
                'post_type' => 'tourist_attraction',
                'posts_per_page' => -1
                ));
                if ($attracList->have_posts()) {
                    while ($attracList->have_posts()) {
                        $attracList->the_post();
                        ?>
                    <div class="list_tourist">
                        <div class="_headerStyle-4">
                            <h2>
                                <?php the_title(); ?> 
                            </h2>
                            <p></p>
                        </div>
                        <div class="list_imgAtt product-gallery">
                            <div class="row">
                            <?php $objGallery = get_field('gallery');
                            $gallery = get_field('gallery', $objGallery->ID);
                            $countImage = count($gallery);
						 //var_dump($countImage);
                            foreach ($gallery as $item) {
                                $image = $item['url'];
                                if ($countImage == 1) { ?> 
                                <div class="col-md-12">
                                    <a class="item" href="<?php echo $image;?>"  title="<?php bloginfo('name'); ?> : <?php the_title(); ?>">
                                        <img src="<?php echo $image; ?>" class="img-responsive" alt="<?php bloginfo('name'); ?> : <?php the_title(); ?>">
                                    </a>
                                </div>
                                <?php }else if($countImage == 2){?>
                                <div class="col-md-6">
                                    <a class="item" href="<?php echo $image; ?>"  title="<?php bloginfo('name'); ?> : <?php the_title(); ?>">
                                        <img src="<?php echo $image; ?>" class="img-responsive" alt="<?php bloginfo('name'); ?> : <?php the_title(); ?>">
                                    </a>
                                </div>                                
                                <?php
                                }else{?> 
                                <div class="col-md-4">
                                    <a class="item" href="<?php echo $image; ?>"  title="<?php bloginfo('name'); ?> : <?php the_title(); ?>">
                                        <img src="<?php echo $image; ?>" class="img-responsive" alt="<?php bloginfo('name'); ?> : <?php the_title(); ?>">
                                    </a>
                                </div>
                                <?php }
                                
                                }
                            ?>
                            </div>
                        </div>
						<div class="detail_tourist">
                            <?php the_content(); ?> 
                        </div>
                    </div>
                    <?php
                }
                wp_reset_query();
            } ?>
            </div>
		   <div class="list_attraction">
              <div class="row">              
               <div class="col-md-5">
               	 <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-responsive">
               </div>
                <div class="col-md-7">
                	<div class="content_attraction">
                <?php
                $custom_terms = get_terms('categories_attractions');
                foreach ($custom_terms as $custom_term) {
                    $args = array(
                        'post_type' => 'attractions',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categories_attractions',
                                'field' => 'slug',
                                'terms' => $custom_term->slug,
                            ),
                        )
                    );
                    $iconImage = get_field('icon', $custom_term);
                    ?>
                	<div class="list_attraction">
                		<ul class="list-unstyled row">                		
                			<li class="col-xs-9 col-md-7 col-sm-8"><div class="icon_img"><img src="<?php echo $iconImage; ?>" alt="<?php echo $custom_term->name ?>" class="img-responsive"></div><strong><?php echo $custom_term->name ?></strong></li>
                			<li class="col-xs-3 col-md-5 col-sm-4"><strong>Distance </strong></li>
                			 <?php $listAtt = new WP_Query($args);
                    if ($listAtt->have_posts()) {
                        while ($listAtt->have_posts()) {
                            $listAtt->the_post(); ?>                			
                			<li class="col-xs-9 col-md-7 col-sm-8"><?php the_title(); ?> 	</li>
                			<li class="col-xs-3 col-md-5 col-sm-4"><?php echo get_field('distance'); ?></li>
                			<?php

                }
                wp_reset_query();
            } ?>
                		</ul>
                	</div>
                	<?php 
            } ?>
                </div>
                </div>
                </div>
            </div>				
			</div>

</section>

<?php
 get_footer();?>
