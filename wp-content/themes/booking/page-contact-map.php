<?php
/*
Template Name: Template Contact Map Image
*/
    get_header('allpage');

    if(have_posts()){
        while(have_posts()){
            the_post();
                $getFax=get_field('box_fax','option');
//    var_dump($getFax);
    $getTel=get_field('box_tel','option');
//    var_dump($getTel);
            $getMobile=get_field('box_mobile','option');
$get_mapImg=get_field('map_image','option');
?>
<!-- .section-detail -->
    <div class="section-contact paddingBottom-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="_headerStyle-1">
                            
                            <h2><?php echo get_field('hotel_name','option');?></h2>
                        </div>
                        <?php the_content();?>           
						<a href="<?php echo get_field('plan','option');?>" class="btn_download" download><i class="fas fa-download"></i> Download Plan</a>
                    </div>
                    <div class="col-md-4">
                        <div class="box-contact">
                            <div class="header address">
                                <h3><?php _e('Address:','booking'); ?></h3>
                            </div>
                            <div class="detail">
                                <p><?php echo get_field('address','option');?></p>
                            </div>
                            <div class="detail box-social">
                                <ul class="list-inline">
                                    <?php get_social_media(); ?>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-4">
                        <div class="box-contact">
                            <div class="header contactInfo">
                                <h3><?php _e('Contact info:','booking'); ?></h3>
                            </div>
                            <div class="detail">
                                <ul>
                            
                            
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
                <div class="contact_form">
                    <?php echo do_shortcode(get_field('contact_form', 'options')); ?>
                </div>
            </div>
    </div>
    <!-- End .section-detail -->


    <div class="google-map">
        <?php echo get_field('google_map','option');?>
        
    </div>
<?php
        }
    }
            get_footer('contact');?>