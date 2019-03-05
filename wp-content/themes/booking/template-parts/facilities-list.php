<?php
    $accommodationList=new WP_Query(array(
        'post_type'=>'facility',
        'posts_per_page'=>-1
    ));
$countRow=0;
    if($accommodationList->have_posts()){
        while($accommodationList->have_posts()){
            $accommodationList->the_post();
            $getIcon=get_field('icon');
?> 
<li>
    <div class="image">
        <a href="#" title="">
            <img width="<?php echo $getIcon['sizes']['width'];?>" height="<?php echo $getIcon['sizes']['height'];?>" src="<?php echo $getIcon['url'];?>" alt="<?php the_title();?>">
        <h3><?php the_title();?></h3>
        </a>
    </div>
</li>
<?php
        }
        wp_reset_postdata();
    }
?>
