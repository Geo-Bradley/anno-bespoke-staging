<?php

function anno_home_metaboxes() 
{
	global $post;

	if(!empty($post))
	{
		$page = get_post_meta($post->ID, '_wp_page_template', true);
		// To add multiple lines - if($page == 'tmpl-home-page.php' || $page == 'tmpl-new-file-example')
		
		if($page == 'tmpl-home.php')
		{
			add_meta_box(
				'anno-home-cat', 
				'Home Category Selector', 
				'anno_home_cat_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-home-upper-section', 
				'Upper Section', 
				'anno_home_upper_section_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-home-we-are-anno', 
				'We Are Anno', 
				'anno_home_we_are_anno_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-home-services', 
				'Services', 
				'anno_home_services_metaboxes', 
				'page', 'normal', 'high');
		}

	}

}
add_action('add_meta_boxes', 'anno_home_metaboxes');


function anno_home_cat_metaboxes($post) {
	wp_nonce_field('anno_home_metabox_nonce_action', 'anno_home_metabox_nonce'); ?>

	<div class="w100">
		<div class="w50">


			<?php
				/* Post Page Tax/Cat Selector */

			$label	= 'Image Slider Category Selector';
			$name	= 'img_slider_cat_selector';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true));
			$taxonomies = get_terms( array(
				'taxonomy' => 'slider_categories',
				'hide_empty' => false,
			) ); ?>
			<p><label><?= $label; ?></label><br><select name="<?= $name; ?>" id="<?= $name; ?>">
				<option value="">-- SELECT --</option>
				<?php
					foreach($taxonomies as $category){ ?>
						<option value="<?= $category->term_id; ?>" <?php selected($meta, $category->term_id); ?>><?= $category->name; ?></option><?php
					}
				?>
			</select></p>

		</div>
		<div class="w50">


			<?php
				/* Post Page Tax/Cat Selector */

			$label	= 'Testimonial Category Selector';
			$name	= 'testimonial_cat_selector';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true));
			$taxonomies = get_terms( array(
				'taxonomy' => 'testimonials_categories',
				'hide_empty' => false,
			) ); ?>
			<p><label><?= $label; ?></label><br><select name="<?= $name; ?>" id="<?= $name; ?>">
				<option value="">-- SELECT --</option>
				<?php
					foreach($taxonomies as $category){ ?>
						<option value="<?= $category->term_id; ?>" <?php selected($meta, $category->term_id); ?>><?= $category->name; ?></option><?php
					}
				?>
			</select></p>

		</div>
	</div>

<?php	
}


function anno_home_upper_section_metaboxes($post) {
	wp_nonce_field('anno_home_metabox_nonce_action', 'anno_home_metabox_nonce'); ?>

	<div class="w100"> 	

		<div class="w50">

			<?php 
			$label		= 'Large Content';
			$name		= 'home_large_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

		</div>
		<div class="w50">

			<?php 
			$label		= 'Small Content';
			$name		= 'home_small_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

			<?php
			$label	= 'Small Content Button';
			$name	= 'home_small_c_btn_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php
			$label	= 'Small Content Button Url';
			$name	= 'home_small_c_btn_url_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>

	<div class="w100">

		<?php
		$label	= 'Ticker 1';
		$name	= 'home_ticker_1_meta_field';
		$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
			<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

	</div>
	<div class="w100">

		<?php
		$label	= 'Ticker 2';
		$name	= 'home_ticker_2_meta_field';
		$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
			<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

	</div>

<?php	
}


function anno_home_we_are_anno_metaboxes($post) {
	wp_nonce_field('anno_home_metabox_nonce_action', 'anno_home_metabox_nonce'); ?>

	<div class="w100"> 	

		<div class="w50">

			<?php
			$label = 'Image';
			$name = 'home_image_meta_field';
			$meta = esc_attr(get_post_meta($post->ID, $name, true));
			$preview = wp_get_attachment_url($meta); ?>
			<p>
				<label><?= $label; ?></label><br>
				<input type="button" class="button button-secondary image_uploader image_uploader_<?= $name; ?>" value="<?= (empty($meta) ? 'Select' : ' Replace'); ?> Image" data-id="<?= $name; ?>">
				<input type="button" class="button button-secondary image_remover<?= (empty($meta) ? '' : ' visible'); ?>" value="Remove Image" id="remove_<?= $name; ?>">
				<input type="hidden" id="image_<?= $name; ?>" name="<?= $name; ?>" value="<?= $meta; ?>">
				<img src="<?= empty($preview) ? '' : $preview; ?>" class="image_previewer small-preview preview_<?= $name.(empty($meta) ? '' : ' visible'); ?>" data-id="<?= $name; ?>">
			</p>

		</div>
		<div class="w50">

			<?php
			$label	= 'Image Title';
			$name	= 'home_image_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Image Content 1';
			$name		= 'home_image_content_1_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

			<?php 
			$label		= 'Image Content 2';
			$name		= 'home_image_content_2_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

		</div>

	</div>

<?php	
}



function anno_home_services_metaboxes($post) {
	wp_nonce_field('anno_home_metabox_nonce_action', 'anno_home_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">

			<?php
			$label	= 'Services Title';
			$name	= 'home_services_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>
		<div class="w50">

			<?php
			$label	= 'Services Text';
			$name	= 'home_services_text_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>


	<div class="w100">

		<div class="w50">

			<?php
			$label	= 'Services Sub-heading';
			$name	= 'home_services_sub_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>
		<div class="w50">

			<?php
			$label	= 'Services Button Title';
			$name	= 'home_services_btn_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php
			$label	= 'Services Button Url';
			$name	= 'home_services_btn_url_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>

<?php	
}


function anno_home_metaboxes_save_function($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['anno_home_metabox_nonce']) || !wp_verify_nonce($_POST['anno_home_metabox_nonce'], 'anno_home_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
    
    $text_array = array(
		'home_ticker_1_meta_field',
		'home_ticker_2_meta_field',
		'home_image_meta_field',
		'home_image_title_meta_field',
		'home_services_title_meta_field',
		'home_services_text_meta_field',
		'home_services_sub_meta_field',
		'home_services_btn_title_meta_field',
		'home_services_btn_url_meta_field',
		'home_small_c_btn_meta_field',
		'home_small_c_btn_url_meta_field',
		'img_slider_cat_selector',
	);
    
    $textarea_array = array(
	);

	$clean_url_array = array(

	);
    
    $url_array = array(
	);

	$editor_array = array(
		'home_large_content_meta_field',
		'home_small_content_meta_field',
		'home_image_content_1_meta_field',
		'home_image_content_2_meta_field',
	);
    
    foreach($text_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = sanitize_text_field($meta);
			update_post_meta($post_id, $name, $save);
		}
	}
    
    foreach($textarea_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = sanitize_textarea_field($meta);
			update_post_meta($post_id, $name, $save);
		}
	}
    
    foreach($clean_url_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = return_clean_url($meta);
			update_post_meta($post_id, $name, $save);
		}
	}
    
    foreach($url_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = esc_url($meta);
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
add_action('save_post', 'anno_home_metaboxes_save_function');