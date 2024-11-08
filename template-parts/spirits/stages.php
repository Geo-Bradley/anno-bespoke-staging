<?php


    $page_id = get_the_id();

    $heading	= esc_attr(get_post_meta($page_id, 'stages_heading_meta_field', true));
    $heading_content	= get_post_meta($page_id, 'stages_content_meta_field', true);


    $content_1	= get_post_meta($page_id, 'stage_1_content_meta_field', true);
    $image_id_1		= esc_attr(get_post_meta($page_id, 'stage_1_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id_1);
	$image_url_1 		= wp_get_attachment_url($image_id_1);

    $content_2	= get_post_meta($page_id, 'stage_2_content_meta_field', true);
    $image_id_2		= esc_attr(get_post_meta($page_id, 'stage_2_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id_2);
	$image_url_2 		= wp_get_attachment_url($image_id_2);

    $content_3	= get_post_meta($page_id, 'stage_3_content_meta_field', true);
    $image_id_3		= esc_attr(get_post_meta($page_id, 'stage_3_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id_3);
	$image_url_3 		= wp_get_attachment_url($image_id_3);

    $content_4	= get_post_meta($page_id, 'stage_4_content_meta_field', true);
    $image_id_4		= esc_attr(get_post_meta($page_id, 'stage_4_image_meta_field', true));
	$image_data 	= wp_get_attachment($image_id_4);
	$image_url_4 		= wp_get_attachment_url($image_id_4);


?>

<div class="spirit-stages section-pad-top white-bg">
    <div class="wide-container">


        <div class="radio-swiper-heading w100">
            <div class="w50">
                <h2 class="skew-up"><?= $heading ?></h2>
            </div>
            <div class="w50">
                <p class="skew-up"><?= $heading_content; ?></p>
            </div>
        </div>

        <div class="radio-swiper-section">
            <div class="switch">
                <input name="radio" type="radio" value="optionone" id="optionone" checked>
                <label for="optionone">STAGE ONE</label>
                <label for="optionone" class="mobile-s">ONE</label>

                <input name="radio" type="radio" value="optiontwo" id="optiontwo">
                <label for="optiontwo" class="second">STAGE TWO</label>
                <label for="optiontwo" class="second mobile-s">TWO</label>

                <input name="radio" type="radio" value="optionthree" id="optionthree">
                <label for="optionthree" class="third">STAGE THREE</label>
                <label for="optionthree" class="third mobile-s">THREE</label>

                <input name="radio" type="radio" value="optionfour" id="optionfour">
                <label for="optionfour" class="fourth">STAGE FOUR</label>
                <label for="optionfour" class="fourth mobile-s">FOUR</label>

                <span aria-hidden="true"></span>
            </div>

            <div class="radio-swiper">
                <div class="w100 radio1 active">

                    <div class="w50">
                        <div class="r-50 ukiyo" style="background-image: url('<?= $image_url_1 ?>');"></div>
                    </div>

                    <div class="w50">
                        <div><?= wpautop( $content_1 ); ?></div>
                        <a class="btn" href="/contact">CONTACT US<i class="fa-solid fa-chevron-right"></i><span></span></a>
                    </div>

                </div>
                <div class="w100 radio2">

                    <div class="w50">
                        <div class="r-50 ukiyo" style="background-image: url('<?= $image_url_2 ?>');"></div>
                    </div>

                    <div class="w50">
                        <div><?= wpautop( $content_2 ); ?></div>
                        <a class="btn" href="/contact">CONTACT US<i class="fa-solid fa-chevron-right"></i><span></span></a>
                    </div>

                </div>
                <div class="w100 radio3">

                    <div class="w50">
                        <div class="r-50 ukiyo" style="background-image: url('<?= $image_url_3 ?>');"></div>
                    </div>

                    <div class="w50">
                        <div><?= wpautop( $content_3 ); ?></div>
                        <a class="btn" href="/contact">CONTACT US<i class="fa-solid fa-chevron-right"></i><span></span></a>
                    </div>

                </div>
                <div class="w100 radio4">

                    <div class="w50">
                        <div class="r-50 ukiyo" style="background-image: url('<?= $image_url_4 ?>');"></div>
                    </div>

                    <div class="w50">
                        <div><?= wpautop( $content_4 ); ?></div>
                        <a class="btn" href="/contact">CONTACT US<i class="fa-solid fa-chevron-right"></i><span></span></a>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>

