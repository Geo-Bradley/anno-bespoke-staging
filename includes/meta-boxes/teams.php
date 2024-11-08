<?php
function team_info_metaboxes(){
	add_meta_box(
		'anno-', 
		'Team Member Info', 
		'anno_team_info_settings', 
		'anno_team', 'normal', 'high'
	);

}
add_action('add_meta_boxes', 'team_info_metaboxes');



function anno_team_info_settings($post){
	wp_nonce_field('team_info_metabox_nonce_action_action', 'team_info_metabox_nonce'); ?>
	

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Job Title';
			$name	= 'team_job_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= 'Favourite Cocktail';
			$name	= 'team_fav_cocktail_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>
			
<?php 
} 


function team_info_metaboxes_save($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['team_info_metabox_nonce']) || !wp_verify_nonce($_POST['team_info_metabox_nonce'], 'team_info_metabox_nonce_action_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
	
	$text_array = array(
		'team_job_title_meta_field',
		'team_fav_cocktail_meta_field',
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
add_action('save_post', 'team_info_metaboxes_save');