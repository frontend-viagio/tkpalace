<?php
/*
Template Name: Template Location
*/

    get_header('allpage');

    if(have_posts()){
        while(have_posts()){
            the_post();
            
            $get_mapImg=get_field('map_image','option');
//            var_dump($get_mapImg['sizes']['image-thumbnails']);

?>


<!-- .section-detail -->
    <div class="section-location paddingBottom-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                            <div id="lightgallery" class="row-lightgallery">
                                <a href="<?php echo $get_mapImg['sizes']['image-thumbnails'];?>" title="<?php the_title();?>">
                                    <img width="<?php echo $get_mapImg['sizes']['image-thumbnails-width'];?>" height="<?php echo $get_mapImg['sizes']['image-thumbnails-height'];?>" src="<?php echo $get_mapImg['sizes']['image-thumbnails'];?>" class="img-responsive" alt="<?php the_title();?>">
                                </a>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                     <div class="col-md-6">
                        <div class="_headerStyle-3">
                            <h2><?php _e('Directions to','booking'); ?><span><?php _e('The L','booking'); ?><span><?php _e('e','booking'); ?></span><?php _e('vana hot','booking'); ?><span><?php _e('e','booking'); ?></span><?php _e('l Pattaya','booking'); ?></span></h2>
                        </div>
                         <div class="detail">
                             <?php echo get_field('directions','option');?>
                         </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- End .section-detail -->
   <?php
                    }
    }
        get_footer();
    
    ?>