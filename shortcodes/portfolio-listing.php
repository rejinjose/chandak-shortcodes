<?php

add_shortcode('chandak_group_portfolio_listing', 'render_chandak_group_portfolio_listing');


add_action('init', 'chandak_group_portfolio_listing_init', 99 );
function chandak_group_portfolio_listing_init(){

    global $kc;

    $kc->add_map(
        array(
            'chandak_group_portfolio_listing' => array(
                'name' => 'Portfolio Block',
                'description' => __('A Portfolio block', 'chandak group'),
                'icon' => 'sc-icon sc-icon-portfolio-listing',
                'category' => 'Chandak Group Shortcodes',
                'is_container' => true,
                'css_box' => true,
                'params' => array(



                    array(
                        'type' => 'toggle',
                        'label' => __( 'Portfolio Item Numbers', 'chandak group' ),
                        'name' => 'filter_status',
                        'description' => __( 'Do you want all the Portfolio items?', 'chandak group' ),
                        'value' => __( 'yes', 'chandak group' ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => __( 'Enter the Portfolio Items number', 'chandak group' ),
                        'name' => 'filter_number',
                        'description' => __( 'Type the number of portolio items, eg: 1,5,10 etc', 'chandak group' ),
                        'value' => __( '5', 'chandak group' ),
                        'relation' => array(
                            'parent'    => 'filter_status',
                            'hide_when' => 'yes'

                        ),
                        'admin_label' => true
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

function render_chandak_group_portfolio_listing( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'filter_status' => 'yes',
        'filter_number' => '5',
    ), $atts ) );

    $portfolio_block = '';

    $portfolio_loop = new WP_Query( array( 'post_type' => 'chandak-portfolio',  'paged'=> false, 'posts_per_page' => '-1' ) );

    $project_number = 0;


    while ( $portfolio_loop->have_posts() ) {
      $portfolio_loop->the_post();
      if($filter_status == 'yes') {

        $project_title = get_the_title();
        $project_loc = get_post_meta( get_the_ID(),'_chandak_portfolio_location',true);
        $project_subtext = get_post_meta( get_the_ID(),'_chandak_portfolio_desc',true);
        $project_thumb = get_post_meta( get_the_ID(),'_chandak_portfolio_thumb',true);


        $portfolio_block .='<div class="col-md-6"><div class="project-listing__each">
                      <a href="'.esc_url(get_the_permalink()).'" class="project-listing-each-content">
                      <div class="row row-no-gutter">
                        <div class="col-md-6 col-no-gutter">
                          <div class="project-listing-each-content__img">
                            <img class="fullwidth" src="'.esc_url($project_thumb).'" alt="chandak group">
                          </div>
                        </div>
                        <div class="col-md-6 col-no-gutter">
                          <div class="project-listing-each-content__text">
                            <h3 class="font1 semibold-font dark-grey uppercase">'.esc_html($project_loc).'</h3>
                            <h2 class="font1 semibold-font black uppercase">'.esc_html($project_title).'</h2>
                            <p class="font1 regular-font black">'.esc_html($project_subtext).'</p>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div></div>';

      } else {
        $project_number++;

        if($project_number <= $filter_number ) {

          $project_title = get_the_title();
          $project_loc = get_post_meta( get_the_ID(),'_chandak_portfolio_location',true);
          $project_subtext = get_post_meta( get_the_ID(),'_chandak_portfolio_desc',true);
          $project_thumb = get_post_meta( get_the_ID(),'_chandak_portfolio_thumb',true);

          $portfolio_block .='<div class="col-md-6"><div class="project-listing__each">
                        <a href="'.esc_url(get_the_permalink()).'" class="project-listing-each-content">
                        <div class="row row-no-gutter">
                          <div class="col-md-6 col-no-gutter">
                            <div class="project-listing-each-content__img">
                              <img class="fullwidth" src="'.esc_url($project_thumb).'" alt="chandak group">
                            </div>
                          </div>
                          <div class="col-md-6 col-no-gutter">
                            <div class="project-listing-each-content__text">
                              <h3 class="font1 semibold-font dark-grey uppercase">'.esc_html($project_loc).'</h3>
                              <h2 class="font1 semibold-font black uppercase">'.esc_html($project_title).'</h2>
                              <p class="font1 regular-font black">'.esc_html($project_subtext).'</p>
                            </div>
                          </div>
                        </div>
                      </a>
                      </div></div>';

        }

      }








    }

    $output = '<div class="project-listing">
                <div class="row">
                  '.$portfolio_block.'
                </div>
              </div>';

    return $output;



    }
