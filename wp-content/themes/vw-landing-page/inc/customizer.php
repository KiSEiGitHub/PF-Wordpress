<?php
/**
 * VW Landing Page Theme Customizer
 *
 * @package VW Landing Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_landing_page_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_landing_page_custom_controls' );

function vw_landing_page_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_landing_page_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_landing_page_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWLandingPageParentPanel = new VW_Landing_Page_WP_Customize_Panel( $wp_customize, 'vw_landing_page_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-landing-page' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_landing_page_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting('vw_landing_page_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Landing_Page_Image_Radio_Control($wp_customize, 'vw_landing_page_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-landing-page'),
        'description' => __('Here you can change the width layout of Website.','vw-landing-page'),
        'section' => 'vw_landing_page_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_landing_page_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_landing_page_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-landing-page'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-landing-page'),
        'section' => 'vw_landing_page_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-landing-page'),
            'Right Sidebar' => __('Right Sidebar','vw-landing-page'),
            'One Column' => __('One Column','vw-landing-page'),
            'Three Columns' => __('Three Columns','vw-landing-page'),
            'Four Columns' => __('Four Columns','vw-landing-page'),
            'Grid Layout' => __('Grid Layout','vw-landing-page')
        ),
	));

	$wp_customize->add_setting('vw_landing_page_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_landing_page_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-landing-page'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-landing-page'),
        'section' => 'vw_landing_page_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-landing-page'),
            'Right Sidebar' => __('Right Sidebar','vw-landing-page'),
            'One Column' => __('One Column','vw-landing-page')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_landing_page_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-landing-page' ),
        'section' => 'vw_landing_page_left_right'
    )));

	$wp_customize->add_setting('vw_landing_page_preloader_bg_color', array(
		'default'           => '#de40bb',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_landing_page_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-landing-page'),
		'section'  => 'vw_landing_page_left_right',
	)));

	$wp_customize->add_setting('vw_landing_page_preloader_border_color', array(
		'default'           => '#feb75b',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_landing_page_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-landing-page'),
		'section'  => 'vw_landing_page_left_right',
	)));
	
	//Topbar
	$wp_customize->add_section( 'vw_landing_page_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting( 'vw_landing_page_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-landing-page' ),
      'section' => 'vw_landing_page_topbar'
    )));

    $wp_customize->add_setting('vw_landing_page_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_landing_page_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-landing-page' ),
        'section' => 'vw_landing_page_topbar'
    )));

    $wp_customize->add_setting('vw_landing_page_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-landing-page' ),
		'section' => 'vw_landing_page_topbar'
    )));

    $wp_customize->add_setting('vw_landing_page_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_search_icon',array(
		'label'	=> __('Add Search Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_topbar',
		'setting'	=> 'vw_landing_page_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_landing_page_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_topbar',
		'setting'	=> 'vw_landing_page_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_landing_page_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_search_font_size',array(
		'label'	=> __('Search Font Size','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_landing_page_phone', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_phone', 
	));

    $wp_customize->add_setting('vw_landing_page_phone_no_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_phone_no_icon',array(
		'label'	=> __('Add Phone Number Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_topbar',
		'setting'	=> 'vw_landing_page_phone_no_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_landing_page_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_landing_page_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_landing_page_phone',array(
		'label'	=> __('Add Phone Number','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_email_icon',array(
		'label'	=> __('Add Email Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_topbar',
		'setting'	=> 'vw_landing_page_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_landing_page_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('vw_landing_page_email',array(
		'label'	=> __('Add Email Address','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_topbtn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_topbtn_text',array(
		'label'	=> __('Add Button Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'REQUEST A CONSULT', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_topbtn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_landing_page_topbtn_url',array(
		'label'	=> __('Add Button URL','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_landing_page_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting( 'vw_landing_page_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-landing-page' ),
      'section' => 'vw_landing_page_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_landing_page_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_landing_page_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_landing_page_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_landing_page_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-landing-page' ),
			'description' => __('Slider image size (1500 x 570)','vw-landing-page'),
			'section'  => 'vw_landing_page_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_landing_page_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_slidersettings',
		'setting'	=> 'vw_landing_page_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_landing_page_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Landing_Page_Image_Radio_Control($wp_customize, 'vw_landing_page_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-landing-page'),
        'section' => 'vw_landing_page_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_landing_page_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-landing-page' ),
		'section'     => 'vw_landing_page_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_landing_page_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_landing_page_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_landing_page_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-landing-page' ),
	'section'     => 'vw_landing_page_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_landing_page_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-landing-page'),
      '0.1' =>  esc_attr('0.1','vw-landing-page'),
      '0.2' =>  esc_attr('0.2','vw-landing-page'),
      '0.3' =>  esc_attr('0.3','vw-landing-page'),
      '0.4' =>  esc_attr('0.4','vw-landing-page'),
      '0.5' =>  esc_attr('0.5','vw-landing-page'),
      '0.6' =>  esc_attr('0.6','vw-landing-page'),
      '0.7' =>  esc_attr('0.7','vw-landing-page'),
      '0.8' =>  esc_attr('0.8','vw-landing-page'),
      '0.9' =>  esc_attr('0.9','vw-landing-page')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_landing_page_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_slider_height',array(
		'label'	=> __('Slider Height','vw-landing-page'),
		'description'	=> __('Specify the slider height (px).','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_landing_page_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_landing_page_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-landing-page'),
		'section' => 'vw_landing_page_slidersettings',
		'type'  => 'number',
	) );
    
	//Info section
	$wp_customize->add_section( 'vw_landing_page_info_section' , array(
    	'title'      => __( 'Info Section', 'vw-landing-page' ),
		'priority'   => null,
		'panel' => 'vw_landing_page_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_landing_page_info', array( 
		'selector' => '.info-box a', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_info',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_landing_page_info',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_landing_page_sanitize_choices',
	));
	$wp_customize->add_control('vw_landing_page_info',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display info','vw-landing-page'),
		'section' => 'vw_landing_page_info_section',
	));

	//Info excerpt
	$wp_customize->add_setting( 'vw_landing_page_info_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_info_excerpt_number', array(
		'label'       => esc_html__( 'Info Excerpt length','vw-landing-page' ),
		'section'     => 'vw_landing_page_info_section',
		'type'        => 'range',
		'settings'    => 'vw_landing_page_info_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//About us section
	$wp_customize->add_section( 'vw_landing_page_about_section' , array(
    	'title'      => __( 'About Section', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_landing_page_section_title', array( 
		'selector' => '#about-section h3', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_section_title',
	));

	$wp_customize->add_setting('vw_landing_page_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_section_title',array(
		'label'	=> __('Add Section Title','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_about_section',
		'type'=> 'text'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_landing_page_about', array(
			'default'           => '',
			'sanitize_callback' => 'vw_landing_page_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_landing_page_about', array(
			'label'    => __( 'Select About Page', 'vw-landing-page' ),
			'description' => __('Image size (1500 x 590)','vw-landing-page'),
			'section'  => 'vw_landing_page_about_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//About excerpt
	$wp_customize->add_setting( 'vw_landing_page_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-landing-page' ),
		'section'     => 'vw_landing_page_about_section',
		'type'        => 'range',
		'settings'    => 'vw_landing_page_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_landing_page_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_about_button_text',array(
		'label'	=> __('Add About Button Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_about_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_about_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_about_button_icon',array(
		'label'	=> __('Add About Button Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_about_section',
		'setting'	=> 'vw_landing_page_about_button_icon',
		'type'		=> 'icon'
	)));

	//Blog Post
	$wp_customize->add_panel( $VWLandingPageParentPanel );

	$BlogPostParentPanel = new VW_Landing_Page_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_landing_page_post_settings', array(
		'title' => __( 'Post Settings', 'vw-landing-page' ),
		'panel' => 'blog_post_parent_panel',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_landing_page_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_landing_page_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-landing-page' ),
        'section' => 'vw_landing_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_landing_page_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_toggle_author',array(
		'label' => esc_html__( 'Author','vw-landing-page' ),
		'section' => 'vw_landing_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_landing_page_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-landing-page' ),
		'section' => 'vw_landing_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_landing_page_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_toggle_time',array(
		'label' => esc_html__( 'Time','vw-landing-page' ),
		'section' => 'vw_landing_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_landing_page_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-landing-page' ),
		'section' => 'vw_landing_page_post_settings'
    )));

    $wp_customize->add_setting( 'vw_landing_page_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-landing-page' ),
		'section'     => 'vw_landing_page_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_landing_page_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_landing_page_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-landing-page'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-landing-page'),
		'section'=> 'vw_landing_page_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_landing_page_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Landing_Page_Image_Radio_Control($wp_customize, 'vw_landing_page_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-landing-page'),
        'section' => 'vw_landing_page_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_landing_page_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_landing_page_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-landing-page'),
        'section' => 'vw_landing_page_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-landing-page'),
            'Excerpt' => __('Excerpt','vw-landing-page'),
            'No Content' => __('No Content','vw-landing-page')
        ),
	) );

	$wp_customize->add_setting('vw_landing_page_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-landing-page' ),
      'section' => 'vw_landing_page_post_settings'
    )));

	$wp_customize->add_setting( 'vw_landing_page_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_landing_page_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_landing_page_blog_pagination_type', array(
        'section' => 'vw_landing_page_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-landing-page' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-landing-page' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-landing-page' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_landing_page_button_settings', array(
		'title' => __( 'Button Settings', 'vw-landing-page' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_landing_page_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_landing_page_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_button_text', 
	));

	$wp_customize->add_setting('vw_landing_page_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'vw-landing-page' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_button_text',array(
		'label'	=> __('Add Button Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_button_settings',
		'setting'	=> 'vw_landing_page_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_landing_page_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-landing-page' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_landing_page_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_landing_page_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_related_post',array(
		'label' => esc_html__( 'Related Post','vw-landing-page' ),
		'section' => 'vw_landing_page_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_landing_page_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_landing_page_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_landing_page_sanitize_float'
	));
	$wp_customize->add_control('vw_landing_page_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_landing_page_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-landing-page' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_landing_page_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-landing-page' ),
		'section' => 'vw_landing_page_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_landing_page_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-landing-page' ),
		'section' => 'vw_landing_page_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_landing_page_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_landing_page_404_page',array(
		'title'	=> __('404 Page Settings','vw-landing-page'),
		'panel' => 'vw_landing_page_panel_id',
	));	

	$wp_customize->add_setting('vw_landing_page_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_landing_page_404_page_title',array(
		'label'	=> __('Add Title','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_landing_page_404_page_content',array(
		'label'	=> __('Add Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_404_page',
		'setting'	=> 'vw_landing_page_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_landing_page_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-landing-page'),
		'panel' => 'vw_landing_page_panel_id',
	));	

	$wp_customize->add_setting('vw_landing_page_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_social_icon_width',array(
		'label'	=> __('Icon Width','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_social_icon_height',array(
		'label'	=> __('Icon Height','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_landing_page_responsive_media',array(
		'title'	=> __('Responsive Media','vw-landing-page'),
		'panel' => 'vw_landing_page_panel_id',
	));

	$wp_customize->add_setting( 'vw_landing_page_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-landing-page' ),
      'section' => 'vw_landing_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_landing_page_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
	));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-landing-page' ),
      'section' => 'vw_landing_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_landing_page_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-landing-page' ),
      'section' => 'vw_landing_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_landing_page_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-landing-page' ),
      'section' => 'vw_landing_page_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_landing_page_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-landing-page' ),
      'section' => 'vw_landing_page_responsive_media'
    )));

    $wp_customize->add_setting('vw_landing_page_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_responsive_media',
		'setting'	=> 'vw_landing_page_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_landing_page_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_responsive_media',
		'setting'	=> 'vw_landing_page_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_landing_page_footer',array(
		'title'	=> __('Footer','vw-landing-page'),
		'panel' => 'vw_landing_page_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_landing_page_footer_text', array( 
		'selector' => '#footer-2 .copyright p', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_footer_text', 
	));
	
	$wp_customize->add_setting('vw_landing_page_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_landing_page_footer_text',array(
		'label'	=> __('Copyright Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_landing_page_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));

	 $wp_customize->add_setting('vw_landing_page_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Landing_Page_Image_Radio_Control($wp_customize, 'vw_landing_page_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-landing-page'),
        'section' => 'vw_landing_page_footer',
        'settings' => 'vw_landing_page_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_landing_page_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-landing-page' ),
      	'section' => 'vw_landing_page_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_landing_page_scroll_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_scroll_top_icon', 
	));

    $wp_customize->add_setting('vw_landing_page_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Landing_Page_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_landing_page_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-landing-page'),
		'transport' => 'refresh',
		'section'	=> 'vw_landing_page_footer',
		'setting'	=> 'vw_landing_page_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_landing_page_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-landing-page'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_landing_page_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Landing_Page_Image_Radio_Control($wp_customize, 'vw_landing_page_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-landing-page'),
        'section' => 'vw_landing_page_footer',
        'settings' => 'vw_landing_page_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_landing_page_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-landing-page'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_landing_page_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_landing_page_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-landing-page' ),
		'section' => 'vw_landing_page_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_landing_page_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_landing_page_customize_partial_vw_landing_page_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_landing_page_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_landing_page_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'vw_landing_page_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-landing-page' ),
		'section' => 'vw_landing_page_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_landing_page_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_landing_page_sanitize_float'
	));
	$wp_customize->add_control('vw_landing_page_products_per_page',array(
		'label'	=> __('Products Per Page','vw-landing-page'),
		'description' => __('Display on shop page','vw-landing-page'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_landing_page_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_landing_page_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_landing_page_products_per_row',array(
		'label'	=> __('Products Per Row','vw-landing-page'),
		'description' => __('Display on shop page','vw-landing-page'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_landing_page_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_landing_page_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_landing_page_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-landing-page' ),
		'section'     => 'vw_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_landing_page_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_landing_page_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_landing_page_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-landing-page'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_landing_page_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_landing_page_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_landing_page_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-landing-page' ),
		'section'     => 'vw_landing_page_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Landing_Page_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Landing_Page_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_landing_page_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Landing_Page_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_landing_page_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Landing_Page_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_landing_page_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_landing_page_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_landing_page_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Landing_Page_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Landing_Page_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Landing_Page_Customize_Section_Pro($manager,'vw_landing_page_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW LANDING PAGE', 'vw-landing-page' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-landing-page' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-landing-page-theme/'),
		)));
	
		// Register sections.
		$manager->add_section(new VW_Landing_Page_Customize_Section_Pro($manager,'vw_landing_page_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-landing-page' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-landing-page' ),
			'pro_url'  => admin_url('themes.php?page=vw_landing_page_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-landing-page-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-landing-page-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Landing_Page_Customize::get_instance();