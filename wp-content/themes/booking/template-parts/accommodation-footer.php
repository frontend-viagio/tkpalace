<div class="box-room">
  
<?php
    $query = array(
        'post_type'     => 'accommodation',
        'posts_per_page' => 3,
        'post__not_in' => array($post->ID)
    );
    $accommodation = new WP_Query($query);
    
    if($accommodation->have_posts()){
        while($accommodation->have_posts()){
            $accommodation->the_post();
?> 


    
        
            <div class="box-detail">
                <div class="image">
                    <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" class="img-responsive">
                </div>
            
                <div class="sub-header">
                    <h3><?php the_title();?></h3>
                </div>
                <div class="roomSize">
                    <?php _e('Room Size: ','booking');?><p><?php echo get_field('room_size');?></p>
                </div>
                <div class="button">
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">Read More</a>
                </div>
            </div>
        
        
    

<?php
        }
        wp_reset_postdata();
    }
?>
    
</div>