<?php

//Theme options to manage address and social media and all that general stuff

//Add menu item
function add_blank_theme_menu_item(){
    add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "blank_theme_settings_page", null, 110);
}
add_action("admin_menu", "add_blank_theme_menu_item");

//Settings Page
function blank_theme_settings_page(){
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

//General Fields
//Telephone
function display_address() {
	?>
        <em style="font-size: 10px">Please include full address</em><br>
    	<input type="text" name="general_address" id="general_address" style="width: 100%" value="<?php echo get_option('general_address'); ?>" />
    <?php
}
function display_telephone() {
	?>
        <em style="font-size: 10px">Please include full telephone number including country code without (0)</em><br>
    	<input type="text" name="general_telephone" id="general_telephone" style="width: 100%" value="<?php echo get_option('general_telephone'); ?>" />
    <?php
}
function display_telephone_text() {
	?>
        <em style="font-size: 10px">Please include phone number with spaces</em><br>
    	<input type="text" name="general_telephone_text" id="general_telephone_text" style="width: 100%" value="<?php echo get_option('general_telephone_text'); ?>" />
    <?php
}

function display_fax() {
	?>
        <em style="font-size: 10px">Please include full fax number including country code without (0)</em><br>
    	<input type="text" name="general_fax" id="general_fax" style="width: 100%" value="<?php echo get_option('general_fax'); ?>" />
    <?php
}
function display_fax_text() {
	?>
        <em style="font-size: 10px">Please include fax number with spaces</em><br>
    	<input type="text" name="general_fax_text" id="general_fax_text" style="width: 100%" value="<?php echo get_option('general_fax_text'); ?>" />
    <?php
}
//General email
function display_email() {
	?>
        <em style="font-size: 10px">Please add general email address</em><br>
    	<input type="email" name="general_email" id="general_email" style="width: 100%" value="<?php echo get_option('general_email'); ?>" />
    <?php
}
//Telephone
function display_marketing_email() {
	?>
        <em style="font-size: 10px">Please add marketing email address (optional)</em><br>
    	<input type="text" name="marketing_email" id="marketing_email" style="width: 100%" value="<?php echo get_option('marketing_email'); ?>" />
    <?php
}




//Social Media Fields
//Social Title
function display_social_title() {
	?>
        <em style="font-size: 10px">Social Title</em><br>
    	<input type="text" name="social_title" id="social_title" style="width: 100%" value="<?php echo get_option('social_title'); ?>" />
    <?php
}

//Twitter
function display_twitter() {
	?>
        <em style="font-size: 10px">Please include full URL</em><br>
    	<input type="url" name="twitter_url" id="twitter_url" style="width: 100%" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

//facebook
function display_facebook() {
	?>
        <em style="font-size: 10px">Please include full URL</em><br>
    	<input type="text" name="facebook_url" id="facebook_url" style="width: 100%" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

//Instagram
function theme_option_display_instagram() {
	?>
        <em style="font-size: 10px">Please include full URL</em><br>
    	<input type="text" name="instagram_url" id="instagram_url" style="width: 100%" value="<?php echo get_option('instagram_url'); ?>" />
    <?php
}

//Linkedin
function display_linkedin() {
	?>
        <em style="font-size: 10px">Please include full URL</em><br>
    	<input type="text" name="linkedin_url" id="linkedin_url" style="width: 100%" value="<?php echo get_option('linkedin_url'); ?>" />
    <?php
}

//Youtube
function display_youtube() {
	?>
        <em style="font-size: 10px">Please include full URL</em><br>
    	<input type="text" name="youtube_url" id="youtube_url" style="width: 100%" value="<?php echo get_option('youtube_url'); ?>" />
    <?php
}




function display_theme_panel_fields()
{   
    add_settings_section("section", "Global site settings for contact details, social media", null, "theme-options");
    
    //Contact Fields
	add_settings_field("general_address", "Address", "display_address", "theme-options", "section");
    add_settings_field("general_telephone", "Telephone Number", "display_telephone", "theme-options", "section");
    add_settings_field("general_telephone_text", "Telephone Number Text", "display_telephone_text", "theme-options", "section");
	
	add_settings_field("general_fax", "Fax Number", "display_fax", "theme-options", "section");
    add_settings_field("general_fax_text", "Fax Number Text", "display_fax_text", "theme-options", "section");
    add_settings_field("general_email", "General Contact Email", "display_email", "theme-options", "section");

	register_setting("section", "general_address");
    register_setting("section", "general_telephone");
    register_setting("section", "general_telephone_text");
	register_setting("section", "general_fax");
    register_setting("section", "general_fax_text");
    register_setting("section", "general_email");
    
    
    //Social Media Profiles	
    add_settings_field("social_title", "Social Title", "display_social_title", "theme-options", "section");
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook", "theme-options", "section");
    add_settings_field("instagram_url", "Instagram Profile Url", "theme_option_display_instagram", "theme-options", "section");
    add_settings_field("linkedin_url", "Linkedin Profile Url", "display_linkedin", "theme-options", "section");
	add_settings_field("youtube_url", "Youtube Profile Url", "display_youtube", "theme-options", "section");

    register_setting("section", "social_title");
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "instagram_url");
    register_setting("section", "linkedin_url");
	register_setting("section", "youtube_url");
    
}

add_action("admin_init", "display_theme_panel_fields");
