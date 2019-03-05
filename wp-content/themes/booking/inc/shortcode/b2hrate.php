<?php

add_action( 'init', 'bookingPageInit' );
function bookingPageInit() {
	$booking_page = get_booking_page();
	$GLOBALS['BOOKING_PAGE'] = $booking_page;
}

if(!function_exists('booking_engine_rate')){
	function booking_engine_rate(){
		echo '<div class="b2hRateResult"></div>';
	}
}
add_shortcode('B2HRate','booking_engine_rate');

if(!function_exists('booking_engine_promotion')){
	function booking_engine_promotion(){
		echo '<div class="b2hPromotionResult" data-url="'.$GLOBALS['BOOKING_PAGE']["booking"].'" data-md="3" data-lg="3" data-sm="6" data-xs="12"></div>';
	}
}
add_shortcode('B2HPromotion','booking_engine_promotion');

if(!function_exists('booking_engine_review')){
	function booking_engine_review(){
		echo '<div class="b2hReviewResult" data-color="'.get_field('color_review','options').'"></div>';
	}
}
add_shortcode('B2HReview','booking_engine_review');

if(!function_exists('booking_engine_review_write')){
	function booking_engine_review_write(){
		echo '<div id="review_block_main"></div>';
	}
}
add_shortcode('B2HReviewWrite','booking_engine_review_write');

if(!function_exists('booking_engine_reset_password')){
	function booking_engine_reset_password(){
		echo '<div id="thankyouContent">';
		echo '<div id="forgetMemberPan"></div>';
		echo '</div>';


	}
}
add_shortcode('B2HResetPassword','booking_engine_reset_password');



if(!function_exists('booking_engine_member_activate')){
 function booking_engine_member_activate(){
  echo '<form action="'.$GLOBALS['BOOKING_PAGE']["booking"].'" method="post" id="frmLogin" name="frmLogin">';
  echo '<div id="thankyouContent">';
  echo '<div id="activateResultPan"></div>';
  echo '</div>';
  echo '</form>';
 }
}
add_shortcode('B2HMemberActivate','booking_engine_member_activate');

if(!function_exists('booking_engine_thankyou')){
	function booking_engine_thankyou(){
		echo '<div id="thankyouContent"></div>';
		echo '<input type="hidden" id="hdURL" value="'.get_home_url().'">';
	}
}
add_shortcode('B2HThankyou','booking_engine_thankyou');
