<?php get_header('404');?>
    <!-- .section-detail -->
    <div class="section-404 padding-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detail">
                            <h2>404 ERROR</h2>
                            <p>We can't find the page</p>
                        </div>
                        <div class="button">
                            <a href="<?php echo home_url();?>" title="<?php echo bloginfo('name');?>" class="btn-backHomepage">
                                back to Homepage
                            </a>
                        </div>
                        <div class="image">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/image-404.png" class="img-responsive" alt="<?php echo bloginfo('name');?>">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- End .section-detail -->
    
<?php get_footer('404');?>
