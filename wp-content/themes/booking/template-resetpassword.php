<?php
/*
Template Name: Template Reset Password
*/

get_header('resetpassword');

if(have_posts()){
	while ( have_posts() ) : the_post();
    
     the_content();


        endwhile;
    }
    get_footer('404');
?>
