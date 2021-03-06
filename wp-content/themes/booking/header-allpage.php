<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <?php wp_head();?>
</head>

<body <?php body_class('all-page');?>>
    <?php
        include_body_script();
    
        $getHotellogo=get_field('logo','option');
//        var_dump($getHotellogo['sizes']);
        $booking_page=get_booking_page();
        $getbooking_page=$booking_page['booking'];
    ?>
    <!-- .bht-header -->
    <header class="bht-header">
        <!-- .bht-header .main-menu -->
        <div class="main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <nav class="navbar navbar-default navbar-offcanvas" role="navigation" id="js-bootstrap-offcanvas">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <?php
                                    if(get_field('member_system','options')=='true'){
                                ?>
                                <div class="btn-group box-memberMobile">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Member
                                  </button>
                                    <div class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0)" id="memberLinkPan" data-text="<?php _e('Sign In','booking'); ?>"></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" id="memberLinkPanRegister" data-text="<?php _e('Sign Up','booking'); ?>"></a>
                                        </li>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <a class="navbar-brand" href="<?php echo home_url();?>" title="<?php bloginfo( 'name' ); ?>">
                                    <img width="<?php echo $getHotellogo['sizes']['medium_large-width'];?>" height="<?php echo $getHotellogo['sizes']['medium_large-height'];?>" src="<?php echo $getHotellogo['sizes']['medium_large'];?>" class="img-responsive" alt="<?php bloginfo( 'name' ); ?>"> 
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <?php
                                            wp_nav_menu( array(
                                                'menu'             => 'primary',
                                                'theme_location'   => 'primary',
                                                'container'        => false,
                                                'items_wrap'       => '%3$s',
                                                'fallback_cb'      => 'wp_bootstrap_navwalker::fallback',
                                                'walker'           => new wp_bootstrap_navwalker()
                                            ));
                                
                                        if(get_field('member_system','options')=='true'){
                                    ?>
                                    
                                    <li class="dropdown box-member">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php _e('MEMBER','booking'); ?> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0)" id="memberLinkPan" data-text="<?php _e('Sign In','booking'); ?>"></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" id="memberLinkPanRegister" data-text="<?php _e('Sign Up','booking'); ?>"></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End .bht-header .main-menu -->
        </div>
        <!-- End .bht-header .main-menu -->
        <!-- .bht-header .box-search -->
        <div class="box-searchLandscape">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-calendar">
                            <div class="calender">
                                <form class="booking-form" name="frmCheckRate" id="frmCheckRate" method="post" action="<?php echo $getbooking_page;?>">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="header">
                                                <h2><?php _e('RESERVATION','booking'); ?></h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                        <label for="dateci"><?php _e('Check In','booking'); ?></label>
                                                        <input type="text" name="dateci" id="dateci" class="form-control" placeholder="<?php _e('Check in','booking'); ?>">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dateco"><?php _e('Check Out','booking'); ?></label>
                                                        <input type="text" name="dateco" id="dateco" class="form-control input-right" placeholder="<?php _e('Check out','booking'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1"><?php _e('Promotion','booking'); ?></label>
                                                <input type="text" id="discountcode" name="discountcode" class="form-control" placeholder="<?php _e('Promotion code','booking'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-block btn-danger" id="btnBook" name="btnBook" value="<?php _e('Check Rate','booking'); ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .bht-header .box-search -->
        
        <!-- section-breadcrumb -->
        <section class="section-breadcrumb paddingTop-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php breadcrumb_bht();?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <h1><?php the_title();?></h1>
							<?php $captitle = get_field('detail');
							if($captitle){
							?>
							<div class="caption_title">
								<p>
									<?php echo $captitle; ?>
								</p>
							</div>
							<?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section-breadcrumb -->
    </header>
    <!-- End .bht-header -->