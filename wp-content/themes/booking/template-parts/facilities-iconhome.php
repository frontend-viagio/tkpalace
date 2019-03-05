<?php
    $accommodationList=new WP_Query(array(
        'post_type'=>'facility',
        'posts_per_page'=>4
    ));
    if($accommodationList->have_posts()){
        while($accommodationList->have_posts()){
            $accommodationList->the_post();
            
            $getIcon=get_field('icon');
            //var_dump($getIcon['sizes']);
?> 

<div class="col-md-6 col-xs-6">
                                <div class="image">
                                    <a href="<?php echo get_permalink(get_page_by_path('facilities'));?>" title="<?php the_title();?>">
                                        <img width="<?php echo $getIcon['sizes']['width'];?>" height="<?php echo $getIcon['sizes']['height'];?>" src="<?php echo $getIcon['url'];?>" alt="<?php the_title();?>">
                                        <h3><?php the_title();?></h3>
                                    </a>
                                </div>
                            </div>
<?php
        }
        wp_reset_postdata();
    }
?>
