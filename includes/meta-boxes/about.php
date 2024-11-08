<?php

function anno_about_metaboxes() 
{
	global $post;

	if(!empty($post))
	{
		$page = get_post_meta($post->ID, '_wp_page_template', true);
		// To add multiple lines - if($page == 'tmpl-about-page.php' || $page == 'tmpl-new-file-example')
		
		if($page == 'tmpl-about.php')
		{
			add_meta_box(
				'anno-about-cat', 
				'About Category Selector', 
				'anno_about_cat_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-hero', 
				'About Hero', 
				'anno_about_hero_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-upper', 
				'About Upper', 
				'anno_about_upper_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-location', 
				'About Location', 
				'anno_about_location_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-craft', 
				'About Craft', 
				'anno_about_craft_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-find-out', 
				'About Find Out', 
				'anno_about_find_out_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-icon', 
				'About Trio Icons', 
				'anno_about_icon_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-about-team', 
				'About Team', 
				'anno_about_team_metaboxes', 
				'page', 'normal', 'high');
		}

	}

}
add_action('add_meta_boxes', 'anno_about_metaboxes');


function anno_about_cat_metaboxes($post) {
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


function anno_about_hero_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= '	Hero Title';
			$name	= 'about_hero_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= '	Hero Subheading';
			$name	= 'about_hero_subheading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>
	<div class="w100">

		<?php
		$label = 'Hero Image';
		$name = 'about_hero_image_meta_field';
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

<?php	
}


function anno_about_upper_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php 
			$label		= 'Large Content';
			$name		= 'about_large_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php 
			$label		= 'Small Content 1';
			$name		= 'about_small_content_1_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

			<?php 
			$label		= 'Small Content 2';
			$name		= 'about_small_content_2_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

		</div>

	</div>
	<div class="w100">
		<div class="w50">
			<?php
			$label	= 'Button Title';
			$name	= 'about_upper_btn_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= 'Button Url';
			$name	= 'about_upper_btn_url_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
	</div>

<?php	
}

function anno_about_location_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Location heading';
			$name	= 'location_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php 
			$label		= 'Location Content';
			$name		= 'location_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>

<?php	
}

function anno_about_craft_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">

			<?php
			$label	= 'craft heading';
			$name	= 'craft_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
			
			<?php 
			$label		= 'craft Content';
			$name		= 'craft_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

			<?php
			$label	= 'Button Title';
			$name	= 'about_craft_btn_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php
			$label	= 'Button Url';
			$name	= 'about_craft_btn_url_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>
		<div class="w50">
			<?php
			$label = 'Craft Image';
			$name = 'about_craft_image_meta_field';
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

	</div>

<?php	
}


function anno_about_find_out_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>



	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Find Out heading';
			$name	= 'find_out_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">		
			<?php 
			$label		= 'Find Out Header Content';
			$name		= 'find_out_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>


	<div class="w100">

		<div class="w50">
			<div class="w100">

				<div class="w50">
					<?php 
					$label		= 'About Us Content';
					$name		= 'find_out_content_1_meta_field';
					$settings	= array("media_buttons" => false, "textarea_rows" => 10);
					$content	= get_post_meta($post->ID, $name, true); ?>
					<p><label><?= $label; ?></label><br>
						<?php wp_editor($content, $name, $settings); ?>
					</p>
				</div>
				<div class="w50">
					<?php
					$label = 'About Us Image';
					$name = 'about_find_out_image_1_meta_field';
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

			</div>
		</div>
		<div class="w50">
			<div class="w100">

				<div class="w50">
					<?php 
					$label		= 'Our Story Content';
					$name		= 'find_out_content_2_meta_field';
					$settings	= array("media_buttons" => false, "textarea_rows" => 10);
					$content	= get_post_meta($post->ID, $name, true); ?>
					<p><label><?= $label; ?></label><br>
						<?php wp_editor($content, $name, $settings); ?>
					</p>
				</div>
				<div class="w50">
					<?php
					$label = 'Our Story Image';
					$name = 'about_find_out_image_2_meta_field';
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

			</div>
		</div>

	</div>

<?php	
}



function anno_about_icon_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>

	<div class="w100">

		<div class="w33">
			<?php
			$label	= 'icon heading 1';
			$name	= 'icon_heading_1_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
			
			<?php 
			$label		= 'icon Content 1';
			$name		= 'icon_content_1_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w33">
			<?php
			$label	= 'icon heading 2';
			$name	= 'icon_heading_2_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
			
			<?php 
			$label		= 'icon Content 2';
			$name		= 'icon_content_2_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w33">
			<?php
			$label	= 'icon heading 3';
			$name	= 'icon_heading_3_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
			
			<?php 
			$label		= 'icon Content 3';
			$name		= 'icon_content_3_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>

<?php	
}

function anno_about_team_metaboxes($post) {
	wp_nonce_field('anno_about_metabox_nonce_action', 'anno_about_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Team heading';
			$name	= 'team_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php 
			$label		= 'Team Content';
			$name		= 'team_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>

<?php	
}


function anno_about_metaboxes_save_function($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['anno_about_metabox_nonce']) || !wp_verify_nonce($_POST['anno_about_metabox_nonce'], 'anno_about_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
    
    $text_array = array(
		'about_hero_title_meta_field',
		'about_hero_subheading_meta_field',
		'about_hero_image_meta_field',
		'about_upper_btn_meta_field',
		'about_upper_btn_url_meta_field',
		'location_heading_meta_field',
		'craft_heading_meta_field',
		'about_craft_btn_meta_field',
		'about_craft_btn_url_meta_field',
		'about_craft_image_meta_field',
		'icon_heading_1_meta_field',
		'icon_heading_2_meta_field',
		'icon_heading_3_meta_field',
		'team_heading_meta_field',
		'find_out_heading_meta_field',
		'about_find_out_image_1_meta_field',
		'about_find_out_image_2_meta_field',
		'img_slider_cat_selector',
	);
    
    $textarea_array = array(
	);

	$clean_url_array = array(
	);
    
    $url_array = array(
	);

	$editor_array = array(
		'about_large_content_meta_field',
		'about_small_content_1_meta_field',
		'about_small_content_2_meta_field',
		'location_content_meta_field',
		'craft_content_meta_field',
		'icon_content_1_meta_field',
		'icon_content_2_meta_field',
		'icon_content_3_meta_field',
		'team_content_meta_field',
		'find_out_content_meta_field',
		'find_out_content_1_meta_field',
		'find_out_content_2_meta_field',
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
add_action('save_post', 'anno_about_metaboxes_save_function');