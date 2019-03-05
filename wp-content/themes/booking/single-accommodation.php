<?php
    get_header('allpage');
    $getBackgroundUnder = get_field('background_under','option');
?>
<!-- .section-roomDetail -->
<section class="section-roomDetail paddingBottom-80" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide'];?>');" >
    <div class="container">
        <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        
                        $getObjectGallery=get_field('gallery');
//            var_dump($getGallery);
                        $getGallery=get_field('gallery',$getObjectGallery->ID);
//                        var_dump($getGallery);
                        $getAmenities=get_field('amenity');
         ?>

        <div class="row">
            <div class="col-md-7">
                <div id="slider" class="accommodation-slide flexslider">
                    <ul class="slides">
                         <?php
                                if($getGallery){
                                    foreach($getGallery as $itemGallery){
//                                        var_dump($itemGallery['sizes']);
                            ?>            
                            <li>
                                <img width="<?php echo $itemGallery['sizes']['image-single-width'];?>" height="<?php echo $itemGallery['sizes']['image-single-height'];?>" src="<?php echo $itemGallery['sizes']['image-single'];?>" class="img-responsive" alt="<?php the_title();?>" />
                            </li>
                            <?php
                                    }
                                }
                            ?> 
                            
                        
                    </ul>
                </div>
                <div id="carousel" class="accommodation-slide flexslider">
                    <ul class="slides">
                        
                        
                        <?php
                                if($getGallery){
                                    foreach($getGallery as $itemGallery){
                                        
                            ?>            
                            <li>
                                <img width="<?php echo $itemGallery['sizes']['medium-width'];?>" height="<?php echo $itemGallery['sizes']['medium-height'];?>" src="<?php echo $itemGallery['sizes']['medium'];?>" class="img-responsive" alt="<?php the_title();?>" />
                            </li>
                            <?php
                                    }
                                }
                            ?>
                        
                        
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box-detail">
                    <div class="_headerStyle-4">
                        <span><?php _e('Room Detail','booking'); ?></span>
                        <h2><?php the_title();?></h2>
                        <p><?php _e('Room Size: ','booking'); ?><?php echo get_field('room_size');?></p>
                        <span><?php _e('Bed Type: ', 'booking'); ?><?php echo get_field('bed_type'); ?></span>
                    </div>
                    <div class="detail">
                        <?php the_content();?>

                    </div>
                </div>

            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                                <div class="box-amenities">
                    <div class="_headerStyle-2">
                        <h2><?php _e('Room Amenities','booking'); ?></h2>
                    </div>
                    <div class="detail">
                        <ul>
                            <?php
                            if($getAmenities){
                                foreach($getAmenities as $itemAmenities){
                        ?>
                        <li><p><?php echo $itemAmenities->post_title;?></p></li>
                        <?php
                                }
                            }
                        ?>
                        </ul>
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