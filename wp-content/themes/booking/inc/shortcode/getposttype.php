<?php
if (!function_exists('getposttype')) {

	function getposttype($args){
		var_dump($args);
		extract(shortcode_atts(array(
			'post_type'=>'accommodation',
			'order_by'=>'date',
			'order'=>'DESC'
		),$args));


		ob_start();
		echo "hello";
		$content=ob_get_contents();
		ob_clean();
		return $content;
	}
	
}
add_shortcode('get_post_type','getposttype');

