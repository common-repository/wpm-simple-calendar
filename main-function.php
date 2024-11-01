<?php 
/*
Plugin Name:wpm simple calendar
Plugin URI: https://wordpress.org/plugins/wpm simple calendar/
Description:This plugin will be enable in your any wordpress themes.you can embed calendar via shortcode in everywhere you want even
in theme files. 
Version:0.1.0
Author:Ariful
Author URI:http://arifulislam.ultimatefreehost.in/
Text Domain:wp-calendar
Domain Path: /languages
*/



//---add latest jquery start  --//

function calendar_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'calendar_wp_latest_jquery');

//---end----//




function calendar_plugin_main_js_css() {
    wp_enqueue_script( 'bootstrap-js', plugins_url( '/js/bootstrap.min.js', __FILE__ ), array('jquery'), 4.0, true);
    wp_enqueue_script( 'calendar-js', plugins_url( '/js/jquery.pickmeup.js', __FILE__ ), array('jquery'), 1.0, true);
    wp_enqueue_script( 'calendardemo-js', plugins_url( '/js/demo.js', __FILE__ ), array('jquery'), 4.0, true);
    wp_enqueue_style( 'bootstrap-css', plugins_url( '/css/bootstrap.min.css', __FILE__ ));
    wp_enqueue_style( 'calendarpickmeup-css', plugins_url( '/css/pickmeup.css', __FILE__ ));
    wp_enqueue_style( 'calendar-css', plugins_url( '/css/style.css', __FILE__ ));
}

add_action('init','calendar_plugin_main_js_css');


// going code to wp header start//


function calendar_active(){?>
	
	<script type="text/javascript"> 
		jQuery( document ).ready(function() {
			jQuery(function () {
				jQuery('.demo').pickmeup({
				flat: true
				});
				var input= $('input');
				input.pickmeup({
				position: 'right',
				before_show: function(){
				input.pickmeup('set_date', input.val(), true);
				},
				change: function(formated){
				input.val(formated);
				}
				});
				});
		});
	</script>
	
<?php	
}


add_action('wp_head','calendar_active');



// end//



//simple shortcode creation start//

 function calendar_sorttcode(){
	
	return '
		<div class="demo"></div>
';	
}

add_shortcode('calendar','calendar_sorttcode');	


///-----end----//















?>