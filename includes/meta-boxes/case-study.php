<?php
function case_study_metaboxes(){
	add_meta_box(
		'anno-case-study-card', 
		'Case Study Page Cards', 
		'case_study_card_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-slider', 
		'Bottle Case Study Slider', 
		'case_study_slider_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-services', 
		'Case Services', 
		'case_services_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-reg-case-study-slider', 
		'Regular Case Study Slider', 
		'case_study_reg_slider_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-text-sec', 
		'Text Section', 
		'case_study_text_sec_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-snapshot', 
		'In A Snapshot', 
		'case_study_snapshot_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-about', 
		'About The Project', 
		'case_study_about_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-services', 
		'Services The Project', 
		'case_study_services_settings', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-bottle-notes-1', 
		'Bottle Notes 1', 
		'case_study_bottle_notes_settings_1', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-bottle-notes-2', 
		'Bottle Notes 2', 
		'case_study_bottle_notes_settings_2', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-bottle-notes-3', 
		'Bottle Notes 3', 
		'case_study_bottle_notes_settings_3', 
		'anno_case_studies', 'normal', 'high'
	);
	add_meta_box(
		'anno-case-study-testimonial', 
		'Large Testimonial', 
		'case_study_testimonial_settings', 
		'anno_case_studies', 'normal', 'high'
	);
}
add_action('add_meta_boxes', 'case_study_metaboxes');



function case_study_card_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>
	

	<div class="w100">

		<div class="w50">
			<?php
			$label	= '	Company Title';
			$name	= 'cs_card_company_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= '	Subheading';
			$name	= 'cs_card_subheading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

		</div>

	</div>
	<div class="w100">

		<div class="w50">
			<?php 
			$label		= ' Content';
			$name		= 'cs_card_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label = ' Image';
			$name = 'cs_card_img_meta_field';
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


function case_study_slider_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>
	
	<div class="w100">

		<div class="w50">
			<?php
			$label	= '	Bottle Slider title';
			$name	= 'bcs_slider_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= '	Bottle Slider Date';
			$name	= 'bcs_slider_date_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>

	</div>

	<div class="w100">

		<div class="w50">

			<?php 
			$label		= 'Bottle Slider Content';
			$name		= 'bcs_slider_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

		</div>
		<div class="w50">

			<?php
			$label = 'Bottle Slider Image';
			$name = 'bcs_slider_img_meta_field';
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

function case_services_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce');
	$services_ids = [];
	
	$args = array(
		'post_type' => 'anno_services',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'post_title',
	);
	
	$query = new WP_Query($args);
	
	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
			$service_id = get_the_ID();
			$services_ids[$service_id] = get_the_title($service_id);
		}
	}
	
	wp_reset_postdata();

	// Checkboxes
		$label = 'Your Services';
		$name = 'cs_services_meta_field';
		$meta = maybe_unserialize(get_post_meta($post->ID, $name, true)); ?>

		<p><label><?= $label; ?></label><br>
			<?php
				if(!empty($services_ids) && is_array($services_ids)){
					foreach($services_ids as $option_slug => $option_name){
						if(is_array($meta) && in_array($option_slug, $meta)){
							$checked = 'checked="checked"';
						}else{
							$checked = null;
						} ?>

						<label for="<?= $name; ?>_<?= $option_slug; ?>">
							<input id="<?= $name; ?>_<?= $option_slug; ?>" type="checkbox" name="<?= $name; ?>_array[]" value="<?= $option_slug; ?>" <?= $checked; ?> />
							<?= $option_name; ?>
						</label><?php
					}
				}
			?>
		</p><?php

} 

function case_study_reg_slider_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>
	

	<div class="w100">

		<?php
		$label	= '	Regular Slider title';
		$name	= 'cs_reg_slider_title_meta_field';
		$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
			<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

	</div>

	<div class="w100">

		<div class="w50">
			<?php 
			$label		= 'Regular Slider Content';
			$name		= 'cs_reg_slider_content_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label = 'Regular Slider Image';
			$name = 'cs_reg_slider_image_meta_field';
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

function case_study_text_sec_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>
	

	<div class="w100">

		<div class="w50">
			<?php 
			$label		= 'Large Text';
			$name		= 'cs_large_text_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php 
			$label		= 'Small Text';
			$name		= 'cs_small_text_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>
			
<?php 
} 

function case_study_snapshot_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>
	

	<div class="w100">

		<div class="w33">
			<?php
			$label	= 'Snapshot Heading 1';
			$name	= 'cs_snapshot_heading_1_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Snapshot Text 1';
			$name		= 'cs_snapshot_text_1_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w33">
			<?php
			$label	= 'Snapshot Heading 2';
			$name	= 'cs_snapshot_heading_2_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Snapshot Text 2';
			$name		= 'cs_snapshot_text_2_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w33">
			<?php
			$label	= 'Snapshot Heading 3';
			$name	= 'cs_snapshot_heading_3_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Snapshot Text 3';
			$name		= 'cs_snapshot_text_3_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>
			
<?php 
} 


function case_study_about_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>
	

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Bottle Number';
			$name	= 'cs_bttle_num_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= 'Bottle Number Text';
			$name	= 'cs_bottle_num_text_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>

	</div>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'About Heading';
			$name	= 'cs_about_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php
			$label = 'About Image';
			$name = 'cs_about_img_meta_field';
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
			$label		= 'About Text 1';
			$name		= 'cs_about_text_1_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>

			<?php 
			$label		= 'About Text 2';
			$name		= 'cs_about_text_2_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>
			
<?php 
} 


function case_study_services_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'services Heading';
			$name	= 'cs_services_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label = 'services Image';
			$name = 'cs_services_img_meta_field';
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


function case_study_bottle_notes_settings_1($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Bottle Notes Heading';
			$name	= 'cs_bnotes_heading_meta_field_1';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label = 'Bottle Image';
			$name = 'cs_bnotes_img_meta_field_1';
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

	<div class="w100">
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_1_meta_field_1';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_1_meta_field_1';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_2_meta_field_1';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_2_meta_field_1';
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
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_3_meta_field_1';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_3_meta_field_1';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_4_meta_field_1';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_4_meta_field_1';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
	</div>
			
<?php 
} 

function case_study_bottle_notes_settings_2($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Bottle Notes Heading';
			$name	= 'cs_bnotes_heading_meta_field_2';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label = 'Bottle Image';
			$name = 'cs_bnotes_img_meta_field_2';
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

	<div class="w100">
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_1_meta_field_2';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_1_meta_field_2';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_2_meta_field_2';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_2_meta_field_2';
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
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_3_meta_field_2';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_3_meta_field_2';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_4_meta_field_2';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_4_meta_field_2';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
	</div>
			
<?php 
} 

function case_study_bottle_notes_settings_3($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Bottle Notes Heading';
			$name	= 'cs_bnotes_heading_meta_field_3';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label = 'Bottle Image';
			$name = 'cs_bnotes_img_meta_field_3';
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

	<div class="w100">
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_1_meta_field_3';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_1_meta_field_3';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_2_meta_field_3';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_2_meta_field_3';
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
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_3_meta_field_3';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_3_meta_field_3';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php
			$label	= 'note heading';
			$name	= 'cs_bnotes_heading_4_meta_field_3';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>

			<?php 
			$label		= 'Note Description';
			$name		= 'cs_bnotes_text_4_meta_field_3';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
	</div>
			
<?php 
} 


function case_study_testimonial_settings($post){
	wp_nonce_field('case_study_metabox_nonce_action', 'case_study_metabox_nonce'); ?>

	<div class="w100">

		<div class="w50">
			<?php
			$label	= 'Name';
			$name	= 'cs_testimonial_heading_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>
		<div class="w50">
			<?php
			$label	= 'Job Title';
			$name	= 'cs_testimonial_job_title_meta_field';
			$meta	= esc_attr(get_post_meta($post->ID, $name, true)); ?>
				<p><label><?= $label; ?></label><br><input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= $meta; ?>" class="large-text"></p>
		</div>

	</div>
	<div class="w100">

		<div class="w50">
			<?php 
			$label		= 'Quote 1';
			$name		= 'cs_testimonial_1_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>
		<div class="w50">
			<?php 
			$label		= 'Quote 2';
			$name		= 'cs_testimonial_2_meta_field';
			$settings	= array("media_buttons" => false, "textarea_rows" => 10);
			$content	= get_post_meta($post->ID, $name, true); ?>
			<p><label><?= $label; ?></label><br>
				<?php wp_editor($content, $name, $settings); ?>
			</p>
		</div>

	</div>
			
<?php 
} 




function case_study_metaboxes_save($post_id){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if(!isset($_POST['case_study_metabox_nonce']) || !wp_verify_nonce($_POST['case_study_metabox_nonce'], 'case_study_metabox_nonce_action')) return;
	if(!current_user_can('edit_post', $post_id)) return;
	
	$text_array = array(
		'bcs_slider_title_meta_field',
		'bcs_slider_date_meta_field',
		'cs_reg_slider_title_meta_field',
		'cs_reg_slider_image_meta_field',
		'bcs_slider_img_meta_field',
		'cs_card_img_meta_field',
		'cs_card_company_title_meta_field',
		'cs_card_subheading_meta_field',
		'cs_snapshot_heading_1_meta_field',
		'cs_snapshot_heading_2_meta_field',
        'cs_snapshot_heading_3_meta_field',
		'cs_bttle_num_meta_field',
		'cs_bottle_num_text_meta_field',
		'cs_about_heading_meta_field',
		'cs_about_img_meta_field',
		'cs_services_heading_meta_field',
		'cs_services_img_meta_field',
		'cs_bnotes_heading_meta_field_1',
		'cs_bnotes_img_meta_field_1',
		'cs_bnotes_heading_1_meta_field_1',
		'cs_bnotes_heading_2_meta_field_1',
		'cs_bnotes_heading_3_meta_field_1',
		'cs_bnotes_heading_4_meta_field_1',
		'cs_bnotes_heading_meta_field_2',
		'cs_bnotes_img_meta_field_2',
		'cs_bnotes_heading_1_meta_field_2',
		'cs_bnotes_heading_2_meta_field_2',
		'cs_bnotes_heading_3_meta_field_2',
		'cs_bnotes_heading_4_meta_field_2',
		'cs_bnotes_heading_meta_field_3',
		'cs_bnotes_img_meta_field_3',
		'cs_bnotes_heading_1_meta_field_3',
		'cs_bnotes_heading_2_meta_field_3',
		'cs_bnotes_heading_3_meta_field_3',
		'cs_bnotes_heading_4_meta_field_3',
		'cs_testimonial_heading_meta_field',
		'cs_testimonial_job_title_meta_field',
	);

	$editor_array = array(
		'bcs_slider_content_meta_field',
		'cs_reg_slider_content_meta_field',
		'cs_card_content_meta_field',
		'cs_large_text_meta_field',
		'cs_small_text_meta_field',
		'cs_snapshot_text_1_meta_field',
        'cs_snapshot_text_2_meta_field',
        'cs_snapshot_text_3_meta_field',
		'cs_about_text_1_meta_field',
		'cs_about_text_2_meta_field',
		'cs_bnotes_text_1_meta_field_1',
		'cs_bnotes_text_2_meta_field_1',
		'cs_bnotes_text_3_meta_field_1',
		'cs_bnotes_text_4_meta_field_1',
		'cs_bnotes_text_1_meta_field_2',
		'cs_bnotes_text_2_meta_field_2',
		'cs_bnotes_text_3_meta_field_2',
		'cs_bnotes_text_4_meta_field_2',
		'cs_bnotes_text_1_meta_field_3',
		'cs_bnotes_text_2_meta_field_3',
		'cs_bnotes_text_3_meta_field_3',
		'cs_bnotes_text_4_meta_field_3',
		'cs_testimonial_1_meta_field',
		'cs_testimonial_2_meta_field',
	);

	$checklist_array = array(
		'cs_services_meta_field',
	);

	foreach($checklist_array as $name){
		if(!empty($_POST[$name.'_array'])){
			update_post_meta($post_id, $name, $_POST[$name.'_array']);
		}else{
			delete_post_meta($post_id, $name);
		}
	}

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
add_action('save_post', 'case_study_metaboxes_save');