<?php


    $page_id = get_the_id();


    $heading	= esc_attr(get_post_meta($page_id, 'find_out_heading_meta_field', true));
    $heading_content	= get_post_meta($page_id, 'find_out_content_meta_field', true);


    $content_1	= get_post_meta($page_id, 'find_out_content_1_meta_field', true);
    $image_id_1		= esc_attr(get_post_meta($page_id, 'about_find_out_image_1_meta_field', true));
	$image_data 	= wp_get_attachment($image_id_1);
	$image_url_1 		= wp_get_attachment_url($image_id_1);

    $content_2	= get_post_meta($page_id, 'find_out_content_2_meta_field', true);
    $image_id_2		= esc_attr(get_post_meta($page_id, 'about_find_out_image_2_meta_field', true));
	$image_data 	= wp_get_attachment($image_id_2);
	$image_url_2 		= wp_get_attachment_url($image_id_2);


?>

<div class="about-find-out section-pad-bottom green-bg">
    <div class="wide-container">


        <div class="radio-swiper-heading w100">
            <div class="w50">
                <h2 class="skew-up"><?= $heading ?></h2>
            </div>
            <div class="w50">
                <p class="skew-up small-skew"><?= $heading_content ?></p>
            </div>
        </div>

        <div class="radio-swiper-section">
            <div class="switch">
                <input name="radio" type="radio" value="optionone" id="optionone" checked>
                <label for="optionone">Option One</label>

                <input name="radio" type="radio" value="optiontwo" id="optiontwo">
                <label for="optiontwo" class="second">Option Two</label>

                <span aria-hidden="true"></span>
            </div>

            <div class="radio-swiper">
                <div class="w100 radio1 active">

                    <div class="w50">
                        <div><?= wpautop( $content_1 ); ?></div>
                    </div>

                    <div class="w50">
                        <div class="r-50 ukiyo" style="background-image: url('<?= $image_url_1 ?>');"></div>
                    </div>

                </div>
                <div class="w100 radio2">

                    <div class="w50">
                        <div><?= wpautop( $content_2 ); ?></div>
                    </div>

                    <div class="w50">
                        <div class="r-50 ukiyo" style="background-image: url('<?= $image_url_2 ?>');"></div>
                    </div>

                </div>
            </div>
        </div>




    </div>
</div>

