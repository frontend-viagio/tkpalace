<div class="slide_rooms">
<?php
    $accommodationList=new WP_Query(array(
        'post_type'=>'accommodation',
        'posts_per_page'=>-1
    ));
    if($accommodationList->have_posts()){
        while($accommodationList->have_posts()){
            $accommodationList->the_post();
            
            $infoDetail=get_the_content();
?> 
    <div class="box-card">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
            <div class="header">
                <h3><?php the_title();?></h3>
            </div>
            <div class="box-image">
                <div class="image" style="background-image: url(<?php the_post_thumbnail_url('image-thumbnails');?>"></div>
            </div>
            <!-- <div class="detail">
                <p><?php 
                                    if(strlen($infoDetail) > 210) {
                                            echo mb_substr(strip_tags($infoDetail),0,210,'utf-8') . " [...]";
                                        } else {
                                            echo $infoDetail;
                                        }
                                    ?></p>
            </div> -->
            <div class="roomSize">
                <span class="pull-left">Room Size : <?php echo get_field('room_size');?></span>
                <span class="pull-right">Bed Type : <?php echo get_field('bed_type'); ?></span>
            </div>
        </a>
        <div class="button">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php _e('Book Now','booking'); ?></a>
        </div>
    </div>

<?php
        }
        wp_reset_postdata();
    }
?>
</div>

