<?php 
/*
Template Name: Template Facilities
*/

get_header('allpage');

                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        
                        $getObjectGallery=get_field('gallery');
//            var_dump($getGallery);
                        $getGallery=get_field('gallery',$getObjectGallery->ID);
//                        var_dump($getGallery);
                        $getAmenities=get_field('amenity');
                        $getBackgroundUnder = get_field('background_under','option');
         ?>


<!-- .section-room -->
<section class="section-facilitiesList paddingBottom-80" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide'];?>');" >
    <div class="container">
        <div class="row">
<?php
    $forPage = get_field('query_for_page');
   foreach($forPage as $itemPage) {
    $titleHi = get_the_title($itemPage->ID);
    $HiImage = get_the_post_thumbnail_url($itemPage->ID, Full);
    $HiLink = get_the_permalink($itemPage->ID);
    $HiCon = $itemPage->post_content;
?> 

<div class="col-md-6">
    <div class="box-card">
        <a href="<?php echo $HiLink;?>" title="<?php echo $titleHi;?>">
            <div class="header">
                <h3><?php echo $titleHi;?></h3>
            </div>
            <div class="box-image">
                <div class="image" style="background-image: url(<?php echo $HiImage;?>"></div>
            </div>           
            <div class="roomSize">
                <p>
                    <?php echo textexcerpt($HiCon, 150); ?>
                </p>
            </div>
        </a>
        <div class="button">
            <a href="<?php echo $HiLink;?>" title="<?php echo $titleHi; ?>"><?php _e('View More','booking'); ?></a>
        </div>
    </div>
</div>
   <?php }
?> 

</div>
        <div class="group-image">
            <div class="row">
                <div class="col-md-12">
                    <div class="slide-facilities flexslider">
                        <ul class="slides">
                            
                            
                            <?php get_template_part('template-parts/facilities','list');?> 
                            
                            
                        </ul>
                    </div>
                </div>




            </div>




        </div>
    </div>
</section>
<!-- End .section-room -->

<?php
                    }
                }
         get_footer();?>