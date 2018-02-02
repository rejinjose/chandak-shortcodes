<?php

// add_shortcode('quad_accordian', 'render_quad_accordian');


add_action('init', 'quad_accordian_init', 99 );
function quad_accordian_init(){

    global $kc;
    $kc->add_map(
        array(
          'quad_kc_accordion' => array(
            'name' => __('Quadnotion Accordion', 'NVA'),
            'description' => __( 'Collapsible content panels', 'NVA' ),
            'category' => 'Chandak Group Shortcodes',
            'icon' => 'kc-icon-accordion',
            'title' => __(' Accordion Settings', 'NVA'),
            'is_container' => true,
            'priority'  => 130,
            'views' => array(
              'type' => 'views_sections',
              'sections' => 'quad_kc_accordion_tab',
              'display' => 'vertical'
            ),
            'params' => array(
              'general' => array(


                array(
                  'name' => 'title',
                  'label' => __(' Title', 'NVA'),
                  'type' => 'text',
                  'description' => __(' Enter accordion title (Note: It is located above the content).', 'NVA')
                ),

                array(
                  'name'    => 'title_css',
                  'type'    => 'css',
                  'options' => array(
                    array(
                      "screens" => "any,1024,999,767,479",
                      'Title' => array(
                        array(
                          'property' => 'font-family,font-size,line-height,letter-spacing,padding,color',
                          'label' => 'Title Font Family,Title Font Size,Title Line Height,Title Letter Spacing,Title Padding,Title Text Color',
                          'selector' => '.quad_kc-accordion-title'
                        ),
                      ),

                      'Hover' => array(
                        array(
                          'property' => 'color',
                          'label' => 'Text Color',
                          'selector' => '.quad_kc-accordion-title:hover'
                        ),
                      ),
                    )
                  )
                ),

                array(
                  'name' => 'close_all',
                  'label' => __(' Close all?', 'NVA'),
                  'type' => 'toggle',
                  'description' => __(' Do not open accordion tab when page loaded', 'NVA')
                ),
                array(
                  'name' => 'open_all',
                  'label' => __(' Collapse all?', 'NVA'),
                  'type' => 'toggle',
                  'description' => __(' Allow all accordion tabs able to open', 'NVA')
                ),
                array(
                  'name' => 'class',
                  'label' => __(' Extra class name', 'NVA'),
                  'type' => 'text',
                  'description' => __(' If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'NVA')
                )
              ),
              'global style' => array(
                array(
                  'name'    => 'css_custom',
                  'type'    => 'css',
                  'options' => array(
                    array(
                      "screens" => "any,1024,999,767,479",
                      'Header' => array(
                        array('property' => 'font-family', 'label' => 'Text Font Family', 'selector' => '.quad_kc_accordion_header, .quad_kc_accordion_header > a'),
                        array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.quad_kc_accordion_header, .quad_kc_accordion_header > a'),
                        array('property' => 'font-size,color,padding', 'label' => 'Icon Size,Icon Color,Icon Spacing', 'selector' => '.quad_kc_accordion_header a i'),
                        array('property' => 'text-align', 'label' => 'Text Alignment', 'selector' => '.quad_kc_accordion_header'),
                        array('property' => 'color,font-weight,text-transform', 'label' => 'Text Color,Font Weight,Text Transform', 'selector' => '.quad_kc_accordion_header a'),
                        array('property' => 'color', 'label' => 'State Icon Color', 'selector' => '.ui-icon'),
                        array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.quad_kc_accordion_header'),
                        array('property' => 'border', 'label' => 'Border', 'selector' => '.quad_kc_accordion_header'),
                        array('property' => 'padding', 'label' => 'Padding', 'selector' => '.quad_kc_accordion_header'),
                      ),
                      'Active' => array(
                        array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-section-active .quad_kc_accordion_header a'),
                        array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc-section-active .quad_kc_accordion_header a i'),
                        array('property' => 'color', 'label' => 'State Icon Color', 'selector' => '.kc-section-active .quad_kc_accordion_header .ui-icon'),
                        array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc-section-active .quad_kc_accordion_header'),
                        array('property' => 'border', 'label' => 'Border', 'selector' => '.quad_kc_accordion_header'),
                      ),
                      'Hover' => array(
                        array('property' => 'color', 'label' => 'Text Color', 'selector' => '.quad_kc_accordion_header:hover a'),
                        array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.quad_kc_accordion_header:hover a i'),
                        array('property' => 'color', 'label' => 'State Icon Color', 'selector' => '.quad_kc_accordion_header:hover .ui-icon'),
                        array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.quad_kc_accordion_header:hover'),
                        array('property' => 'border', 'label' => 'Border', 'selector' => '.quad_kc_accordion_header'),
                      ),
                      'Body' => array(
                        array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc-panel-body'),
                        array('property' => 'border', 'label' => 'Border', 'selector' => '.quad_kc_accordion_content'),
                        array('property' => 'padding', 'label' => 'Spacing', 'selector' => '.kc-panel-body'),
                        array('property' => 'display', 'label' => 'Display'),
                      ),


                    )
                  )
                )
              ),
              'animate' => array(
                array(
                  'name'    => 'animate',
                  'type'    => 'animate'
                )
              ),
            ),
            'content' => '[quad_kc_accordion_tab title="Accordion Tab"][/quad_kc_accordion_tab]'
          ),


          'quad_kc_accordion_tab' => array(
      			'name' => __(' Accordion Tab', 'NVA'),
      			'category' => '',
      			'title' => __(' Accordion Tab Settings', 'NVA'),
      			'is_container' => true,
      			'system_only' => true,
            'accept_child'	=> 'kc_title,kc_column_text',
          	'params' => array(
      				'general' => array(
      					array(
      						'name' => 'title',
      						'label' => __(' Title', 'NVA'),
      						'value' => __(' New Accordion Tab', 'NVA'),
      						'type' => 'text'
      					),
      					array(
      						'name' => 'icon_option',
      						'label' => __(' Use Icon?', 'NVA'),
      						'type' => 'toggle',
      						'description' => __(' Display an icon beside the title', 'NVA')
      					),
      					array(
      						'name' => 'icon',
      						'label' => __(' Icon Title', 'NVA'),
      						'type' => 'icon_picker',
      						'value' => '',
      						'description' => __(' Choose an icon to display with title', 'NVA'),
      						'relation' => array(
      							'parent' => 'icon_option',
      							'show_when' => 'yes'
      						)
      					),
      					array(
      						'name' => 'class',
      						'label' => __(' Extra class name', 'NVA'),
      						'type' => 'text',
      						'description' => __(' ', 'NVA')
      					)
      				),

      			)
      		),



        )
    );

}


// Register Before After Shortcode

add_shortcode('quad_kc_accordion', 'render_quad_kc_accordion');
add_shortcode('quad_kc_accordion_tab', 'render_quad_kc_accordion_tab');

function render_quad_kc_accordion( $atts, $content = null ) {


  $css = $title = '';
  extract( $atts );

  $output = '';

  $element_attributes = array();
  $css_classes        = apply_filters('kc-el-class', $atts);
  $css_classes[]      = 'kc_accordion_wrapper';



  if (isset($class))
  	array_push($css_classes, $class);

  if (isset($atts['open_all']) &&  $atts['open_all'] == 'yes')
  	$element_attributes[] = 'data-allowopenall="true"';

  if (isset($atts['close_all']) && $atts['close_all'] == 'yes')
  	$element_attributes[] = 'data-closeall="true"';

  $css_class = implode(' ', $css_classes);


  $element_attributes[]   = 'class="' . esc_attr( trim( $css_class ) ) . '"';

  ?>
  <div <?php echo implode( ' ', $element_attributes ) ;?>>
  <?php
  if( !empty($title) ):
  ?>
      <h3 class="quad_kc-accordion-title kc-accordion-title"><?php echo esc_html($title);?></h3>
  <?php
  endif;
  echo do_shortcode( str_replace( 'kc_accordion#', 'kc_accordion', $content ) );
  ?>
  </div>
  <?php
}

function render_quad_kc_accordion_tab( $atts, $content = null ) {
  $css_class = apply_filters( 'kc-el-class', $atts );
  $css_class[] = 'kc_accordion_section';
  $css_class[] = 'group';

  $title = 'Title';

  if( isset( $atts['title'] ) )
  	$title = $atts['title'];
  if( isset( $atts['icon'] ) )
  	$title = $title.' <i class="'.esc_attr( $atts['icon'] ).'"></i> ';

  if( isset( $atts['class'] ) )
  	array_push( $css_class, $atts['class'] );

  $output  =  '<div class="'.esc_attr( implode(' ',$css_class) ).'"><h3 class="kc_accordion_header quad_kc_accordion_header ui-accordion-header">'.
  					'<span class="ui-accordion-header-icon ui-icon"></span>'.
  		  			'<a href="#' . sanitize_title( $title ) . '" data-prevent="scroll">' . $title . '</a>'.
  		  		'</h3>'.
  			  	'<div class="kc_accordion_content ui-accordion-content kc_clearfix">'.
  					'<div class="kc-panel-body">'.
  						( ( '' === trim( $content ) )
  						? __( 'Empty section. Edit page to add content here.', 'kingcomposer' )
  						: do_shortcode( str_replace('kc_accordion_tab#', 'kc_accordion_tab', $content ) ) ).
  					'</div>'.
  				'</div>'.
  			'</div>';

  echo $output;
}

?>
