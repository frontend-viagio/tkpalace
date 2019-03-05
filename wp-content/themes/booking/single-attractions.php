<?php
    get_header('allpage');
$getBackgroundUnder = get_field('background_under','option');
?>
<section class="section-attractionsDetail paddingBottom-80"  style="background-image: url('<?php echo $getBackgroundUnder['sizes']['image-slide'];?>');" >
    <div class="container">
        <?php
                if(have_posts()){
                    while(have_posts()){
                        the_post();
                        
                        $getObjectGallery=get_field('gallery');
                        $getGallery=get_field('gallery',$getObjectGallery->ID);
                        $getAmenities=get_field('amenity');
         ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-gallery lightgallery">



				<div class="row">
					<?php
					$countImage=1;
					$maxDisplay=5;

					$objGallery=get_field('gallery');
					$gallery=get_field('gallery',$objGallery->ID);

					foreach($gallery as $item){
						$image=$item['url'];
						if($countImage==1){


							?>
							<div class="col-md-6">
								<a class="item" href="<?php echo $image;?>" title="<?php bloginfo('name');?> : <?php the_title(); ?>">

									<img src="<?php echo $image;?>" class="img-responsive" alt="<?php bloginfo('name');?> : <?php the_title(); ?>">
								</a>
							</div>
							<div class="col-md-6 hidden-xs">
								<div class="row">
									<?php
								}else{
									if($countImage<5){
										?>
										<div class="col-md-6">
											<a class="item" href="<?php echo $image;?>" title="<?php bloginfo('name');?> : <?php the_title(); ?>">

												<img src="<?php echo $image;?>" class="img-responsive" alt="<?php bloginfo('name');?> : <?php the_title(); ?>">
											</a>
										</div>
										<?php
									}else{
										if($countImage==5){
										?>
										<div class="col-md-6">

											<a class="item" href="<?php echo $image;?>" style="position:relative;display:block;" title="<?php bloginfo('name');?> : <?php the_title(); ?>">
												<span style="position:absolute;text-align:center;padding-top:30%;display:block;width:100%;height:100%;background-color:rgba(0,0,0,0.7);color:#fff;">View Image More+</span>
												<img src="<?php echo $image;?>" class="img-responsive" alt="<?php bloginfo('name');?> : <?php the_title(); ?>">
											</a>
										</div>
										<?php
										}else{
										?>
										<a class="item item-hide" href="<?php echo $image;?>" title="<?php bloginfo('name');?> : <?php the_title(); ?>">

												<img src="<?php echo $image;?>" class="img-responsive" alt="<?php bloginfo('name');?> : <?php the_title(); ?>">
											</a>
										<?php
										}

									}
								}

								$countImage++;
							}
							?>







						</div>

					</div>
					<!--end-->
				</div>

			</div>
                </div>
                
            </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="box-detail">
                        <div class="_headerStyle-4">
                            <h2>
                                <?php the_title();?>
                            </h2>
                            <p>
                                <?php _e('Location : ','booking'); ?>
                                <?php echo get_field('location');?>
                            </p>
                        </div>
                        <div class="detail">
                            <?php the_content();?>
                        </div>
                        <?php 
                    $howtogetthere = get_field('how_to_get_there');
                    if($howtogetthere){
                        ?>
                        <div class="detail detail-howtogetthere">
                            <h3><?php _e('How to get there : ','booking'); ?></h3>
                            <p><?php echo $howtogetthere;?></p>
                        </div>
                        <?php
                    }
                    ?>
                    </div>

                </div>
        </div>

            <?php
                    }
                }
            ?>

    </div>
</section>
<!-- End .section-roomDetail -->
<?php
        get_footer();
    
?>
