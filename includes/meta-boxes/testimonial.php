<?php
function testimonial_metaboxes(){
	add_meta_box(
		'anno-testimonial-slider', 
		'Testimonial Slider', 
		'testimonial_slider_settings', 
		'testimonials', 'normal', 'high'
	);
}
add_action('add_meta_boxes', 'testimonial_metaboxes');

function testimonial_slider_settings($post){
	wp_nonce_field('testimonial_metabox_nonce_action', 'testimonial_metabox_nonce'); ?>
	
	<div class="w100">

		<?php
		$label	= '	Job Title';
		$name	= 'job_title_meta_field';
		$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
			<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

	</div>
			
<?php 
} 



function testimonial_metaboxes_save($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['testimonial_metabox_nonce']) || !wp_verify_nonce($_POST['testimonial_metabox_nonce'], 'testimonial_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
	
	$text_array = array(
		'job_title_meta_field'
	);

	$editor_array = array(
	);


	foreach($text_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = sanitize_text_field($meta);
			update_post_meta($post_id, $name, $save);
		}
	}

	foreach($editor_array as $name){
		$meta = isset($_POST[$name]) ? $_POST[$name] : '';
		if(isset($meta)){
			$save = wp_kses_post($meta);
			update_post_meta($post_id, $name, $save);
		}
	}
	
}
add_action('save_post', 'testimonial_metaboxes_save');