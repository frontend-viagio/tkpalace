<?php
/*
Template Name: Template Gallery
*/
get_header('allpage');

?> 


<!-- .section-detail -->
    <div class="section-gallery paddingBottom-80">
            <div class="container">
                <div class="row">
                    
                   <?php 
                $args=array(
                    'post_type'=>'gallery',
                    'posts_per_page'=>-1

                );
                $query=new WP_Query($args);
                $countRow=0;
                if($query->have_posts()){
                    while ( $query->have_posts() ) : $query->the_post();
                   
                    $gallery=get_field('gallery');
                    
                    if($countRow%3==0){
                        ?>
                    </div>
                    <div class="row">
                        <?php
                    }
                ?> 
                    
                    
                    
                    <div class="col-md-4">
                        <div class="pic-gallery _padding40">
                            
                            <div id="lightgallery" class="row-lightgallery">
                                
                            <?php
                                $countImage=1;
                                foreach($gallery as $item){
                                 $image_item=$item["sizes"]["image-single"];
                                 if($countImage==1){
                                    ?>
                                    <a href="<?php echo $image_item;?>" title="<?php the_title();?>">
                                     <img width="<?php echo $item["sizes"]["image-single-width"];?>" height="<?php echo $item["sizes"]["image-single-height"];?>" class="img-responsive" src="<?php echo $image_item;?>" alt="<?php the_title();?>">

                                 </a>
                                 <?php
                             }else{
                                ?>
                                
                                <a href="<?php echo $image_item;?>" title="<?php the_title();?>">
                                     <img width="<?php echo $item["sizes"]["image-single-width"];?>" height="<?php echo $item["sizes"]["image-single-height"];?>" class="img-responsive hide-img" src="<?php echo $image_item;?>" alt="<?php the_title();?>">

                                 </a>
                                <?php
                            }
                            ?>

                            <?php
                            $countImage++;
                                    
                        }
                        ?>
                                
                                
                            </div>
                            <div class="header-line">
                                <h2><?php the_title();?></h2>
                            </div>
                        </div>
                    </div>
                        
                        
                                <?php
                    $countRow++;     
            endwhile;
               
        }
        ?>
                        
                        
                </div>
            </div>
    </div>
    <!-- End .section-detail -->
<?php get_footer();?>