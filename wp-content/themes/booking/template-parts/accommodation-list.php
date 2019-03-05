<div class="row">
<?php
    $accommodationList=new WP_Query(array(
        'post_type'=>'accommodation',
        'posts_per_page'=>-1
    ));
$countRow=0;
    if($accommodationList->have_posts()){
        while($accommodationList->have_posts()){
            $accommodationList->the_post();
            
            $infoDetail=get_the_content();
            if($countRow%2==0){
                        ?>
                    </div>
                    <div class="row">
                        <?php
                    }
?> 

<div class="col-md-6">
    <div class="box-card">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
            <div class="header">
                <h3><?php the_title();?></h3>
            </div>
            <div class="box-image">
                <div class="image" style="background-image: url(<?php the_post_thumbnail_url('image-thumbnails');?>"></div>
            </div>           
            <div class="roomSize">
               <span class="pull-left">Room Size : <?php echo get_field('room_size');?></span>
                <span class="pull-right">Bed Type : <?php echo get_field('bed_type'); ?></span>
            </div>
        </a>
        <div class="button">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php _e('Book Now','booking'); ?></a>
        </div>
    </div>
</div>
<?php
            $countRow++; 
        }
        wp_reset_postdata();
    }
        ?>
</div>