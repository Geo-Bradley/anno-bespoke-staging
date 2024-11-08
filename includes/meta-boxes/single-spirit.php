<?php
function single_spirit_metaboxes(){
	add_meta_box(
		'anno-single-our-spirits', 
		'Our Spirits', 
		'single_spirit_our_spirits_settings', 
		'anno_spirit', 'normal', 'high'
	);
	add_meta_box(
		'anno-single-spirit-craft', 
		'Craft', 
		'single_spirit_craft_settings', 
		'anno_spirit', 'normal', 'high'
	);
	add_meta_box(
		'anno-single-spirit-accordion', 
		'Accordion Section', 
		'anno_single_spirits_accordion_metaboxes', 
		'anno_spirit', 'normal', 'high'
	);
}
add_action('add_meta_boxes', 'single_spirit_metaboxes');




function single_spirit_our_spirits_settings($post) {
	wp_nonce_field('single_spirit_metabox_nonce_action', 'single_spirit_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Our spirits heading';
			$name	= 'our_pirits_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php 
			$label		= 'Our spirits Content';
			$name		= 'our_pirits_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>

<?php	
}

function single_spirit_craft_settings($post) {
	wp_nonce_field('single_spirit_metabox_nonce_action', 'single_spirit_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">

			<?php
			$label	= 'craft heading';
			$name	= 's_spirit_craft_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
			
			<?php 
			$label		= 'craft Content';
			$name		= 's_spirit_craft_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

			<?php
			$label	= 'Button Title';
			$name	= 's_spirit_craft_btn_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php
			$label	= 'Button Url';
			$name	= 's_spirit_craft_btn_url_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>
		<div class="w50">
			<?php
			$label = 'Craft Image';
			$name = 's_spirit_craft_image_meta_field';
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

function anno_single_spirits_accordion_metaboxes($post) {
	wp_nonce_field('anno_spirits_metabox_nonce_action', 'anno_spirits_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'accordion Title';
			$name	= 's_spirits_accordion_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">

			<?php 
			$label		= 'accordion Content';
			$name		= 's_spirits_accordion_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

		</div>

	</div>

<?php	
}




function single_spirit_metaboxes_save($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['single_spirit_metabox_nonce']) || !wp_verify_nonce($_POST['single_spirit_metabox_nonce'], 'single_spirit_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
	
	$text_array = array(
		'our_pirits_heading_meta_field',
		'our_pirits_content_meta_field',
		'our_pirits_heading_meta_field',
		's_spirit_craft_heading_meta_field',
		's_spirit_craft_btn_meta_field',
		's_spirit_craft_btn_url_meta_field',
		's_spirit_craft_image_meta_field',
		's_spirits_accordion_title_meta_field',
	);

	$editor_array = array(
		's_spirit_craft_content_meta_field',
		's_spirits_accordion_content_meta_field',
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
add_action('save_post', 'single_spirit_metaboxes_save');