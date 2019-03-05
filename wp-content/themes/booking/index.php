<?php
    /*
        Template Name: Template Home
    */

     get_header();

    
?>

    <!-- .section-welcome -->
    <section class="section-welcome padding-40">
        <div class="container">
            <div class="row">
                <?php
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            
                            $getImagetitle1=get_field('image_title_1');
                            $getImagetitle2=get_field('image_title_2');
//                            var_dump($getImagetitle1['sizes']);
                ?>            
                <div class="col-md-6"> 
                    <div class="detail">
                        <div class="_headerStyle-1">
                            <p><?php _e('Welcome to','booking'); ?></p>
                            <h1><?php _e('L','booking'); ?><span><?php _e('E','booking'); ?></span><?php _e('VANA HOT','booking'); ?><span><?php _e('E','booking'); ?></span><?php _e('L PATTAYA','booking'); ?></h1>
                        </div>
                       <?php the_content();?>
                        <div class="textHighlight">
                            <p><?php echo get_field('text_highlight');?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image">
                        <img width="<?php echo $getImagetitle1['sizes']['medium_large-width'];?>" height="<?php echo $getImagetitle1['sizes']['medium_large-height'];?>" src="<?php echo $getImagetitle1['sizes']['medium_large'];?>" alt="<?php echo $getImagetitle1['alt'];?>" class="img-responsive leftImage">
                        <img width="<?php echo $getImagetitle2['sizes']['medium_large-width'];?>" height="<?php echo $getImagetitle2['sizes']['medium_large-height'];?>" src="<?php echo $getImagetitle2['sizes']['medium_large'];?>" alt="<?php echo $getImagetitle2['alt'];?>" class="img-responsive rightImage">
                    </div>
                </div>
                <?php
                        }
                    }
                
                ?>
                
            </div>
        </div>
    </section>
    <!-- End .section-welcome -->
    <!-- .section-room -->
    <section class="section-room padding-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_headerStyle-2">
                        <h2><?php _e('OUR ROOM','booking'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php get_template_part('template-parts/accommodation','home');?> 
            </div>
        </div>
    </section>
    <!-- End .section-room -->
    <!-- .section-facilities -->
    <section class="section-facilities padding-40">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hidden-xs">
                    <div class="group-image">
                        <div class="row">
                            <?php get_template_part('template-parts/facilities','iconhome');?> 
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="_headerStyle-3">
                        <h2><?php _e('Hotel Facilities','booking'); ?><span><?php _e('& Services','booking'); ?></span></h2>
                    </div>
                    <?php get_template_part('template-parts/facilities','home');?> 
                </div>
            </div>
        </div>
    </section>
    <!-- End .section-facilities -->


<?php get_footer();?>
