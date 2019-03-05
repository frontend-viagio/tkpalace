<?php
    get_header('allpage');

    $getBackgroundUnder = get_field('background_under','option');
?>
    <!-- .section-room -->
    <section class="section-room paddingBottom-80" style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide'];?>');" >
        <div class="container">

            
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                                    <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        the_content();
                    }
                }
            ?>
                    </div>
                </div>
            </div>
            
            
            
                
                
                <?php get_template_part('template-parts/accommodation','list');?> 
                
                
                
                
            
        </div>
    </section>
    <!-- End .section-room -->


   <?php
        get_footer();
    
    ?>