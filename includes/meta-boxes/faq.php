<?php

function anno_faq_metaboxes() 
{
	global $post;

	if(!empty($post))
	{
		$page = get_post_meta($post->ID, '_wp_page_template', true);
		// To add multiple lines - if($page == 'tmpl-faq-page.php' || $page == 'tmpl-new-file-example')
		
		if($page == 'tmpl-faqs.php')
		{
			add_meta_box(
				'anno-faq-hero', 
				'FAQ Hero', 
				'anno_faq_hero_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-faq-Contact', 
				'FAQ Contact', 
				'anno_faq_contact_metaboxes', 
				'page', 'normal', 'high');
		}

	}

}
add_action('add_meta_boxes', 'anno_faq_metaboxes');


function anno_faq_hero_metaboxes($post) {
	wp_nonce_field('anno_faq_metabox_nonce_action', 'anno_faq_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= '	Hero Title';
			$name	= 'faq_hero_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= '	Hero Subheading';
			$name	= 'faq_hero_subheading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>
	<div class="w100">

		<?php
		$label = 'Hero Image';
		$name = 'faq_hero_image_meta_field';
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


function anno_faq_contact_metaboxes($post) {
	wp_nonce_field('anno_faq_metabox_nonce_action', 'anno_faq_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Contact Heading';
			$name	= 'faq_contact_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Contact Content';
			$name		= 'faq_contact_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'Button Title';
			$name	= 'faq_contact_btn_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php
			$label	= 'Button Url';
			$name	= 'faq_contact_btn_url_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>

	</div>

<?php	
}



function anno_faq_metaboxes_save_function($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['anno_faq_metabox_nonce']) || !wp_verify_nonce($_POST['anno_faq_metabox_nonce'], 'anno_faq_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
    
    $text_array = array(
		'faq_hero_title_meta_field',
		'faq_hero_subheading_meta_field',
		'faq_hero_image_meta_field',
		'faq_contact_heading_meta_field',
		'faq_contact_btn_meta_field',
		'faq_contact_btn_url_meta_field',
	);
    
    $textarea_array = array(
	);

	$clean_url_array = array(
	);
    
    $url_array = array(
	);

	$editor_array = array(
		'faq_contact_content_meta_field',
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
add_action('save_post', 'anno_faq_metaboxes_save_function');