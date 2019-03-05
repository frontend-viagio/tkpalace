<?php
    $accommodationList=new WP_Query(array(
        'pagename' => 'booking2hotels_review'
    ));
    if($accommodationList->have_posts()){
        while($accommodationList->have_posts()){
            $accommodationList->the_post();
the_content();
        }
        wp_reset_postdata();
    }
?>