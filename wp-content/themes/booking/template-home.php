<?php
    /*
        Template Name: Template Home
    */

     get_header();

    
?>
                <?php
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            
                            $getImagetitle1=get_field('image_title_1');
                            $getImagetitle2=get_field('image_title_2');
//                            var_dump($getImagetitle1['sizes']);
                            
                            $getSectionRoom = get_field('section_room');
//                            var_dump($getSectionRoom);
                            $getSectionIntro = get_field('section_intro');
                ?>  
    <!-- .section-welcome -->
    <section class="section-welcome paddingTop-80">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutleft.png" alt="" class="img-responsive bgleftAbout">
        <div class="container">
            <div class="row">
          
                <div class="col-md-7"> 
                    <div class="detail">
                        <div class="_headerStyle-1">
                            <p><?php _e('Welcome to','booking'); ?></p>
                            <h1><?php echo get_field('hotel_name','option');?> <span><?php _e('& Convention', 'booking'); ?></span></h1>
                        </div>
                       <?php the_content();?>
                        <div class="textHighlight">
                            <p><?php echo get_field('text_highlight');?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="image">
                        <div class="leftImage" style="background-image: url('<?php echo $getImagetitle1['sizes']['medium_large']; ?>');">

                        </div>
                        <div class="rightImage" style="background-image: url('<?php echo $getImagetitle2['sizes']['medium_large']; ?>');">

                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!-- End .section-welcome -->
                <?php
                        }
                    }
                
                ?>
    <!-- .section-room -->
    <section class="section-room padding-40" style="background-image: url('<?php echo $getSectionRoom['sizes']['image-slide'];?>');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_headerStyle-2">
                        <h2><?php _e('Accommodation','booking'); ?></h2>
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
                <div class="col-md-5 col-md-offset-1">
                    <div class="_headerStyle-3">
                        <h2><?php _e('Hotel Facilities','booking'); ?><span><?php _e('& Services','booking'); ?></span></h2>
                    </div>
                    <?php get_template_part('template-parts/facilities','home');?> 
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri();?>/assets/images/bgfac.png" alt="" class="img-reponsive bgfac">
    </section>
    <!-- End .section-facilities -->


<?php get_footer();?>
