<?php

function anno_spirits_metaboxes() 
{
	global $post;

	if(!empty($post))
	{
		$page = get_post_meta($post->ID, '_wp_page_template', true);
		// To add multiple lines - if($page == 'tmpl-spirits-page.php' || $page == 'tmpl-new-file-example')
		
		if($page == 'tmpl-spirits.php')
		{
			add_meta_box(
				'anno-spirit-cat', 
				'Spirits Category Selector', 
				'anno_spirit_cat_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-spirits-hero', 
				'Spirits Hero', 
				'anno_spirits_hero_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-spirits-green-sec', 
				'Spirits Green Section', 
				'anno_spirits_green_sec_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-spirits-stages', 
				'Spirits Stages', 
				'anno_spirits_stages_metaboxes', 
				'page', 'normal', 'high');
		}
		add_meta_box(
			'anno-spirit-cat', 
			'Spirits Category Selector', 
			'anno_spirit_cat_metaboxes', 
			'anno_spirit', 'normal', 'high');

	}

}
add_action('add_meta_boxes', 'anno_spirits_metaboxes');


function anno_spirit_cat_metaboxes($post) {
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


function anno_spirits_hero_metaboxes($post) {
	wp_nonce_field('anno_spirits_metabox_nonce_action', 'anno_spirits_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= '	Hero Title';
			$name	= 'spirits_hero_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= '	Hero Subheading';
			$name	= 'spirits_hero_subheading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>


<?php	
}


function anno_spirits_green_sec_metaboxes($post) {
	wp_nonce_field('anno_spirits_metabox_nonce_action', 'anno_spirits_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Section Title';
			$name	= 'spirits_g_section_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">

			<?php 
			$label		= 'Section Content';
			$name		= 'spirits_g_section_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

		</div>

	</div>

<?php	
}




function anno_spirits_stages_metaboxes($post) {
	wp_nonce_field('anno_spirits_metabox_nonce_action', 'anno_spirits_metabox_nonce'); ?>



	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Stages heading';
			$name	= 'stages_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">		
			<?php 
			$label		= 'Stages Header Content';
			$name		= 'stages_content_meta_field';
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
					$label		= 'Stage 1 Content';
					$name		= 'stage_1_content_meta_field';
					$settings	= array("media_buttons" => false, "textarea_rows" => 10);
					$content	= get_post_meta($post->ID, $name, true); ?>
					<p><label><?= $label; ?></label><br>
						<?php wp_editor($content, $name, $settings); ?>
					</p>
				</div>
				<div class="w50">
					<?php
					$label = 'Stage 1 Image';
					$name = 'stage_1_image_meta_field';
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
					$label		= 'Stage 2 Content';
					$name		= 'stage_2_content_meta_field';
					$settings	= array("media_buttons" => false, "textarea_rows" => 10);
					$content	= get_post_meta($post->ID, $name, true); ?>
					<p><label><?= $label; ?></label><br>
						<?php wp_editor($content, $name, $settings); ?>
					</p>
				</div>
				<div class="w50">
					<?php
					$label = 'Stage 2 Image';
					$name = 'stage_2_image_meta_field';
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

	<div class="w100">

		<div class="w50">
			<div class="w100">

				<div class="w50">
					<?php 
					$label		= 'Stage 3 Content';
					$name		= 'stage_3_content_meta_field';
					$settings	= array("media_buttons" => false, "textarea_rows" => 10);
					$content	= get_post_meta($post->ID, $name, true); ?>
					<p><label><?= $label; ?></label><br>
						<?php wp_editor($content, $name, $settings); ?>
					</p>
				</div>
				<div class="w50">
					<?php
					$label = 'Stage 3 Image';
					$name = 'stage_3_image_meta_field';
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
					$label		= 'Stage 4 Content';
					$name		= 'stage_4_content_meta_field';
					$settings	= array("media_buttons" => false, "textarea_rows" => 10);
					$content	= get_post_meta($post->ID, $name, true); ?>
					<p><label><?= $label; ?></label><br>
						<?php wp_editor($content, $name, $settings); ?>
					</p>
				</div>
				<div class="w50">
					<?php
					$label = 'Stage 4 Image';
					$name = 'stage_4_image_meta_field';
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





function anno_spirits_metaboxes_save_function($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['anno_spirits_metabox_nonce']) || !wp_verify_nonce($_POST['anno_spirits_metabox_nonce'], 'anno_spirits_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
    
    $text_array = array(
		'spirits_hero_title_meta_field',
		'spirits_hero_subheading_meta_field',
		'spirits_g_section_title_meta_field',
		'stage_1_image_meta_field',
		'stage_2_image_meta_field',
		'stage_3_image_meta_field',
		'stage_4_image_meta_field',
		'stages_heading_meta_field',
		'img_slider_cat_selector',
	);
    
    $textarea_array = array(
	);

	$clean_url_array = array(
	);
    
    $url_array = array(
	);

	$editor_array = array(
		'spirits_g_section_content_meta_field',
		'stage_1_content_meta_field',
		'stage_2_content_meta_field',
		'stage_3_content_meta_field',
		'stage_4_content_meta_field',
		'stages_content_meta_field',
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
add_action('save_post', 'anno_spirits_metaboxes_save_function');