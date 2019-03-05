<?php
    $getFax=get_field('box_fax','option');
//    var_dump($getFax);
    $getTel=get_field('box_tel','option');
//    var_dump($getTel);
    $getMobile=get_field('box_mobile','option');
?>

    <footer class="bht-footer padding-80">
        <div class="container">
            <div class="row">
                 <div class="col-md-3">
<!--
                    <div class="banner-tapoma">
                        <a href="http://www.tapoma.com/eng/thailand/pattaya-attractions.html" title="What to do in Pattaya Thailand" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-tapoma.png" class="img-responsive" alt="What to do in Pattaya Thailand">
                        </a>
                    </div> 
-->
                    
                    <div class="logo_footer">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logofooter.png" alt="" class="img-responsive">
                    </div>
                    <div class="box-social">
                        <ul class="list-inline">
                            <?php get_social_media(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <div class="box-contact">
                        <ul>
                            <li class="address">TK. Palace Hotel &amp; Convention   : <?php echo get_field('address','option');?></li>
                            
                            <?php
                                if($getTel){
                            ?>
                            <li class="tel">Tel : 
                                <?php
                                    
                                        foreach($getTel as $itemTel){
                                ?>
                                <a href="tel:<?php echo $itemTel['tel'];?>" title=""><?php echo $itemTel['tel'];?></a>
                                <?php
                                        }
                                    
                                ?>
                            </li>
                            <?php
                                    }
                            
                                if($getMobile){
                            ?>
                            <li class="mobile">Mobile : 
                                <?php
                                        foreach($getMobile as $itemMobile){
                                ?>
                                <a href="tel:<?php echo $itemMobile['mobile'];?>" title=""><?php echo $itemMobile['mobile'];?></a>
                                <?php
                                        }
                                   
                                ?>
                            </li>
                            <?php
                                }
                            ?>
                            <?php
                            if($getFax){
                                ?>
                            <li class="fax">Fax : <?php
                                    
                                        foreach($getFax as $itemFax){
//                                            var_dump($itemFax['fax']);
                                            ?>
                                            <span><?php echo $itemFax['fax'];?></span>
                                <?php
                                        }
                                    
                                ?>
                            </li>
                            <?php
                                }
                            ?>
                            
                            <?php
                                if(get_field('email','option')){
                            ?>
                            <li class="mail">Email : 
                                <a herf="mailto:<?php echo get_field('email','option');?>" title=""><?php echo get_field('email','option');?></a>
                            </li>
                            <?php
                                }
                            ?>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
<!--
    <div class="bg-logoFooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<div class="sister_hotel">
                		<ul id="list_sister" class="list-inline">
                			<li><a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/sister/levana.png" alt="" class="img-responsive"></a></li>
                			<li><a href="https://www.flipperhotels.com/flipper_house" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/images/sister/house.png" alt="" class="img-responsive"></a></li>
                			<li><a href="https://www.flipperhotels.com/flipper_lodge" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/images/sister/lodge.png" alt="" class="img-responsive"></a></li>
                			<li><a href="http://www.niceresortpattaya.com/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/images/sister/nice.png" alt="" class="img-responsive"></a></li>
                		</ul>
                	</div>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="bht-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-7">
                    <div class="my_footer_menu">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'footer',
                            'theme_location' => 'footer',
                            'menu_class' => 'list-inline'
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-md-7 col-md-pull-5">
                    <a href="http://www.booking2hotels.com" title="" target="_blank" class="link_copy">
                        <?php get_copyright();?>
                    </a>
                </div>
                 
            </div>
        </div>
    </div>

    <?php
        wp_footer();
        search_init();
    ?>
<script type="text/javascript">
	$('#list_sister').lightSlider({
        item:4,
        loop:false,
        slideMove:2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        controls:false,
//        autoWidth:true,
        pager:false,
        responsive : [
            {
                breakpoint:991,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:767,
                settings: {
                    item:2,
                    slideMove:1
                }
            }
        ]
    });  
</script>
</body>

</html>