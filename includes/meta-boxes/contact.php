<?php

function anno_contact_metaboxes() 
{
	global $post;

	if(!empty($post))
	{
		$page = get_post_meta($post->ID, '_wp_page_template', true);
		// To add multiple lines - if($page == 'tmpl-contact-page.php' || $page == 'tmpl-new-file-example')
		
		if($page == 'tmpl-contact.php')
		{
			add_meta_box(
				'anno-contact-hero', 
				'contact Hero', 
				'anno_contact_hero_metaboxes', 
				'page', 'normal', 'high');
		}

	}

}
add_action('add_meta_boxes', 'anno_contact_metaboxes');


function anno_contact_hero_metaboxes($post) {
	wp_nonce_field('anno_contact_metabox_nonce_action', 'anno_contact_metabox_nonce'); ?>


	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Contact Title 1';
			$name	= 'hero_contact_title_1_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= 'Contact Title 2';
			$name	= 'hero_contact_title_2_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
			
	</div>	
	<div class="w100">
		<?php
		$label = 'Map Image';
		$name = 'contact_map_img_meta_field';
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


function anno_contact_metaboxes_save_function($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['anno_contact_metabox_nonce']) || !wp_verify_nonce($_POST['anno_contact_metabox_nonce'], 'anno_contact_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
    
    $text_array = array(
		"hero_contact_title_1_meta_field",
		'hero_contact_title_2_meta_field',
		'contact_map_img_meta_field',
	);
    
    foreach($text_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = sanitize_text_field($meta);
			update_post_meta($post_id, $name, $save);
		}
	}
    
}
add_action('save_post', 'anno_contact_metaboxes_save_function');