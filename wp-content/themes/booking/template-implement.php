<?php

/*
Template Name: Booking Implement
*/
get_header('b2h');
$getBackgroundUnder = get_field('background_under','option');
if(have_posts()){
	while ( have_posts() ) : the_post();
?>
    	
    <!-- .section-detail -->
    <div class="section-detail paddingBottom-80" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide'];?>');" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="booking-engine">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- End .section-detail -->

<?php
	endwhile;
}
get_footer();
?>
