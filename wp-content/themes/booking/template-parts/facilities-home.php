<?php
    $accommodationList=new WP_Query(array(
        'pagename' => 'facilities'
    ));
    if($accommodationList->have_posts()){
        while($accommodationList->have_posts()){
            $accommodationList->the_post();
?> 
<div class="detail">
                        <?php the_content();?>
                    </div>
<?php
        }
        wp_reset_postdata();
    }
?>