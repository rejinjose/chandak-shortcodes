<?php

add_shortcode('chandak_group_slide_in_text_img_banner', 'render_chandak_group_slide_in_text_img_banner');


add_action('init', 'chandak_group_slide_in_text_img_banner_init', 99 );
function chandak_group_slide_in_text_img_banner_init(){

    global $kc;

    $kc->add_map(
        array(
            'chandak_group_slide_in_text_img_banner' => array(
                'name' => 'Sliding Text Image Banner',
                'description' => __('A text image banner with sliding effect', 'chandak group'),
                'icon' => 'sc-icon sc-icon-slide-in-text-img-banner',
                'category' => 'Chandak Group Shortcodes',
                'is_container' => true,
                'css_box' => true,
                'params' => array(



                    array(
                        'type' => 'radio',
                        'label' => __( 'Banner Style', 'chandak group' ),
                        'name' => 'banner_style',
                        'options' => array(    // REQUIRED
                      		'option_1' => 'Text Block Left',
                      		'option_2' => 'Text Block Right'
                      	),
                        'description' => __( 'Do you want text block at left or right side?', 'chandak group' ),
                        'value' => __( 'option_1', 'chandak group' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => __( 'Enter the Title', 'chandak group' ),
                        'name' => 'title',
                        'description' => __( 'Provide the title', 'chandak group' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => __( 'Enter the subtitle', 'chandak group' ),
                        'name' => 'subtitle',
                        'description' => __( 'Provide the subtitle', 'chandak group' ),
                    ),
                    array(
                        'type' => 'color_picker',
                        'label' => __( 'Provide the background color', 'chandak group' ),
                        'name' => 'bg_color',
                        'description' => __( 'Provide the background color for the text block', 'chandak group' ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'label' => __( 'Provide the image', 'chandak group' ),
                        'name' => 'section_img',
                        'description' => __( 'Provide the image for the image section', 'chandak group' ),
                    ),
                    array(
                        'type' => 'link',
                        'label' => __( 'Enter the button details', 'chandak group' ),
                        'name' => 'btn_link',
                        'description' => __( 'Provide the text and url for the button', 'chandak group' ),
                    ),
                    array(
                        'name' => 'custom_class',
                        'label' => 'Extra Class',
                        'type' => 'text',
                    )
                )
            )
        )
    );

}


// Register Before After Shortcode

function render_chandak_group_slide_in_text_img_banner( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'banner_style' => 'option_1',
        'title' => '',
        'subtitle' => '',
        'bg_color' => '',
        'section_img' => '',
        'btn_link' => ''

    ), $atts ) );


    $content = '';
    $btn_link	= kc_parse_link($btn_link);
    $section_img_url = wp_get_attachment_image_src( $section_img , 'full');
    // var_dump();
    // var_dump($btn_link['url']);
    // var_dump($btn_link['title']);

    if($banner_style == 'option_1') {
      $content = '<div class="slide-in-banner slide-in-banner--left-text">
                    <div class="slide-in-banner__text-block text-right" style="background:'.esc_attr($bg_color).';">
                      <div class="slide-in-banner__text-block--revealer" style="background:'.esc_attr($bg_color).';"></div>
                      <div class="slide-in-banner__text-block--title">
                        <h3 class="font1 medium-font white">'.esc_html($title).'</h3>
                      </div>
                      <div class="slide-in-banner__text-block--desc pad-top-quarter">
                        <p class="font1 light-font white">'.esc_html($subtitle).'</p>
                      </div>
                      <div class="slide-in-banner__text-block--button chandak-button">
                        <a href="'.esc_url($btn_link['url']).'" class="font1 normal-font white-bg uppercase ease" style="color:'.esc_attr($bg_color).'">'.esc_html($btn_link['title']).'</a>
                      </div>
                    </div>

                    <div class="slide-in-banner__img-block section-bgimg" data-sectionBgImg="'.esc_attr($section_img_url[0]).'" ></div>
                    <div class="float-clear"></div>
                  </div>';
    } else {
      $content = '<div class="slide-in-banner slide-in-banner--right-text">
                    <div class="slide-in-banner__img-block section-bgimg" data-sectionBgImg="'.esc_attr($section_img_url[0]).'" ></div>

                    <div class="slide-in-banner__text-block text-left" style="background:'.esc_attr($bg_color).';">
                      <div class="slide-in-banner__text-block--revealer" style="background:'.esc_attr($bg_color).';"></div>
                      <div class="slide-in-banner__text-block--title">
                        <h3 class="font1 medium-font white">'.esc_html($title).'</h3>
                      </div>
                      <div class="slide-in-banner__text-block--desc pad-top-quarter">
                        <p class="font1 light-font white">'.esc_html($subtitle).'</p>
                      </div>
                      <div class="slide-in-banner__text-block--button chandak-button">
                        <a href="'.esc_url($btn_link['url']).'" class="font1 normal-font white-bg uppercase ease" style="color:'.esc_attr($bg_color).'">'.esc_html($btn_link['title']).'</a>
                      </div>
                    </div>
                    <div class="float-clear"></div>
                  </div>';
    }


    $output = $content;

    return $output;



    }
