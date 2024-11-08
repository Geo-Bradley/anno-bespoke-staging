<?php

function anno_studies_metaboxes() 
{
	global $post;

	if(!empty($post))
	{
		$page = get_post_meta($post->ID, '_wp_page_template', true);
		// To add multiple lines - if($page == 'tmpl-case-studies-page.php' || $page == 'tmpl-new-file-example')
		
		if($page == 'tmpl-case-studies.php')
		{
			add_meta_box(
				'anno-study-cat', 
				'Studies Category Selector', 
				'anno_study_cat_metaboxes', 
				'page', 'normal', 'high');
			add_meta_box(
				'anno-studies-hero', 
				'studies Hero', 
				'anno_studies_hero_metaboxes', 
				'page', 'normal', 'high');
		}
		add_meta_box(
			'anno-study-cat', 
			'Studies Category Selector', 
			'anno_study_cat_metaboxes', 
			'anno_case_studies', 'normal', 'high');

	}

}
add_action('add_meta_boxes', 'anno_studies_metaboxes');



function anno_study_cat_metaboxes($post) {
	wp_nonce_field('anno_home_metabox_nonce_action', 'anno_home_metabox_nonce'); ?>

	<div class="w100">
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

<?php	
}


function anno_studies_hero_metaboxes($post) {
	wp_nonce_field('anno_studies_metabox_nonce_action', 'anno_studies_metabox_nonce'); ?>


	<div class="w100">

	<div class="w50">
		<?php
		$label	= 'studies Title 1';
		$name	= 'hero_studies_title_1_meta_field';
		$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
			<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
	</div>
	<div class="w50">
		<?php
		$label	= 'studies Title 2';
		$name	= 'hero_studies_title_2_meta_field';
		$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
			<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
	</div>
			
	</div>	


<?php	
}


function anno_studies_metaboxes_save_function($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['anno_studies_metabox_nonce']) || !wp_verify_nonce($_POST['anno_studies_metabox_nonce'], 'anno_studies_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
    
    $text_array = array(
		"hero_studies_title_1_meta_field",
		'hero_studies_title_2_meta_field',
		'img_slider_cat_selector',
	);
    
    foreach($text_array as $name){
		$meta = (empty($_POST[$name]) ? '' : $_POST[$name]);
		if(isset($meta)){
			$save = sanitize_text_field($meta);
			update_post_meta($post_id, $name, $save);
		}
	}
    
}
add_action('save_post', 'anno_studies_metaboxes_save_function');