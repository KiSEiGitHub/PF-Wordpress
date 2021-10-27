<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_landing_page_first_color = get_theme_mod('vw_landing_page_first_color');

	$vw_landing_page_custom_css = '';

	if($vw_landing_page_first_color != false){
		$vw_landing_page_custom_css .='.pagination a:hover, .pagination .current, #comments a.comment-reply-link, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #preloader{';
			$vw_landing_page_custom_css .='background-color: '.esc_attr($vw_landing_page_first_color).';';
		$vw_landing_page_custom_css .='}';
	}
	if($vw_landing_page_first_color != false){
		$vw_landing_page_custom_css .='a, .custom-social-icons i:hover, #footer .custom-social-icons i:hover, #footer li a:hover, #sidebar li a:hover , .post-navigation a:hover .post-title,.post-navigation a:focus .post-title, .post-navigation a:hover,.post-navigation a:focus, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer .more-button a:hover, #footer .more-button:hover i, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .logo .site-title a:hover, #slider .inner_carousel h1 a:hover, .content-vw p a{';
			$vw_landing_page_custom_css .='color: '.esc_attr($vw_landing_page_first_color).';';
		$vw_landing_page_custom_css .='}';
	}
	if($vw_landing_page_first_color != false){
		$vw_landing_page_custom_css .='.post-main-box, #sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_attr($vw_landing_page_first_color).';
		}';
	}
	if($vw_landing_page_first_color != false){
		$vw_landing_page_custom_css .='.main-navigation ul ul{';
			$vw_landing_page_custom_css .='border-top-color: '.esc_attr($vw_landing_page_first_color).';';
		$vw_landing_page_custom_css .='}';
	}
	if($vw_landing_page_first_color != false){
		$vw_landing_page_custom_css .='.main-navigation ul ul{';
			$vw_landing_page_custom_css .='border-bottom-color: '.esc_attr($vw_landing_page_first_color).';';
		$vw_landing_page_custom_css .='}';
	}

	/*---------------Second highlight color-------------------*/

	$vw_landing_page_second_color = get_theme_mod('vw_landing_page_second_color');

	if($vw_landing_page_first_color != false || $vw_landing_page_second_color != false){
		$vw_landing_page_custom_css .='input[type="submit"], #topbar, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #slider .view-more:hover, .view-more, #info-section, #footer-2, #comments input[type="submit"], #sidebar .custom-social-icons i,#footer .custom-social-icons i, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, .wp-block-button__link, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button{
		background: linear-gradient(-90deg, '.esc_attr($vw_landing_page_first_color).', '.esc_attr($vw_landing_page_second_color).');
		}';
	}
	if($vw_landing_page_first_color != false || $vw_landing_page_second_color != false){
		$vw_landing_page_custom_css .='#slider .carousel-caption{
		border-image: linear-gradient(to bottom, '.esc_attr($vw_landing_page_first_color).', '.esc_attr($vw_landing_page_second_color).') 1 100%;
		}';
	}
	if($vw_landing_page_first_color != false || $vw_landing_page_second_color != false){
		$vw_landing_page_custom_css .='#about-section hr,.post-info hr{
		border-image: linear-gradient(to left, '.esc_attr($vw_landing_page_first_color).', '.esc_attr($vw_landing_page_second_color).') 1;
		}';
	}
	if($vw_landing_page_first_color != false || $vw_landing_page_second_color != false){
		$vw_landing_page_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{
		border-image: linear-gradient(to left, '.esc_attr($vw_landing_page_first_color).', '.esc_attr($vw_landing_page_second_color).') 1;
		}';
	}
	if($vw_landing_page_second_color != false){
		$vw_landing_page_custom_css .='.loader-line{';
			$vw_landing_page_custom_css .='border-color: '.esc_attr($vw_landing_page_second_color).';';
		$vw_landing_page_custom_css .='}';
	}
	
	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_landing_page_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$vw_landing_page_custom_css .='body{';
			$vw_landing_page_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.scrollup i{';
		  $vw_landing_page_custom_css .='right: 100px;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.scrollup.left i{';
		  $vw_landing_page_custom_css .='left: 100px;';
		$vw_landing_page_custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$vw_landing_page_custom_css .='body{';
			$vw_landing_page_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.scrollup i{';
		  $vw_landing_page_custom_css .='right: 30px;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.scrollup.left i{';
		  $vw_landing_page_custom_css .='left: 30px;';
		$vw_landing_page_custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$vw_landing_page_custom_css .='body{';
			$vw_landing_page_custom_css .='max-width: 100%;';
		$vw_landing_page_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_landing_page_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.1'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.1';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.2'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.2';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.3'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.3';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.4'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.4';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.5'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.5';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.6'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.6';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.7'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.7';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.8'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.8';
		$vw_landing_page_custom_css .='}';
		}else if($theme_lay == '0.9'){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='opacity:0.9';
		$vw_landing_page_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_landing_page_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$vw_landing_page_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_landing_page_custom_css .='text-align:left; left:15%; right:35%;';
		$vw_landing_page_custom_css .='}';
	}else if($theme_lay == 'Center'){
		$vw_landing_page_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_landing_page_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='#slider .carousel-caption{';
			$vw_landing_page_custom_css .='border-left:none;';
		$vw_landing_page_custom_css .='}';
	}else if($theme_lay == 'Right'){
		$vw_landing_page_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_landing_page_custom_css .='text-align:right; left:35%; right:16%;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='#slider .carousel-caption{';
			$vw_landing_page_custom_css .='border-left:none; border-right:solid 5px;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='#slider .inner_carousel{';
			$vw_landing_page_custom_css .='padding-right: 20px;';
	}

	/*---------------------------Slider Height ------------*/

	$vw_landing_page_slider_height = get_theme_mod('vw_landing_page_slider_height');
	if($vw_landing_page_slider_height != false){
		$vw_landing_page_custom_css .='#slider img{';
			$vw_landing_page_custom_css .='height: '.esc_attr($vw_landing_page_slider_height).';';
		$vw_landing_page_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_landing_page_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$vw_landing_page_custom_css .='.post-main-box{';
			$vw_landing_page_custom_css .='';
		$vw_landing_page_custom_css .='}';
	}else if($theme_lay == 'Center'){
		$vw_landing_page_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_landing_page_custom_css .='text-align:center;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.post-info{';
			$vw_landing_page_custom_css .='margin-top:10px;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.post-info hr{';
			$vw_landing_page_custom_css .='margin:10px auto;';
		$vw_landing_page_custom_css .='}';
	}else if($theme_lay == 'Left'){
		$vw_landing_page_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_landing_page_custom_css .='text-align:Left;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.post-info hr{';
			$vw_landing_page_custom_css .='margin-bottom:10px;';
		$vw_landing_page_custom_css .='}';
		$vw_landing_page_custom_css .='.post-main-box h2{';
			$vw_landing_page_custom_css .='margin-top:10px;';
		$vw_landing_page_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_landing_page_resp_topbar = get_theme_mod( 'vw_landing_page_resp_topbar_hide_show',false);
	if($vw_landing_page_resp_topbar == true && get_theme_mod( 'vw_landing_page_topbar_hide_show', false) == false){
    	$vw_landing_page_custom_css .='#topbar{';
			$vw_landing_page_custom_css .='display:none;';
		$vw_landing_page_custom_css .='} ';
	}
    if($vw_landing_page_resp_topbar == true){
    	$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='#topbar{';
			$vw_landing_page_custom_css .='display:block;';
		$vw_landing_page_custom_css .='} }';
	}else if($vw_landing_page_resp_topbar == false){
		$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='#topbar{';
			$vw_landing_page_custom_css .='display:none;';
		$vw_landing_page_custom_css .='} }';
	}

	$vw_landing_page_resp_stickyheader = get_theme_mod( 'vw_landing_page_stickyheader_hide_show',false);
	if($vw_landing_page_resp_stickyheader == true && get_theme_mod( 'vw_landing_page_sticky_header',false) != true){
    	$vw_landing_page_custom_css .='.header-fixed{';
			$vw_landing_page_custom_css .='position:static;';
		$vw_landing_page_custom_css .='} ';
	}
    if($vw_landing_page_resp_stickyheader == true){
    	$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='.header-fixed{';
			$vw_landing_page_custom_css .='position:fixed;';
		$vw_landing_page_custom_css .='} }';
	}else if($vw_landing_page_resp_stickyheader == false){
		$vw_landing_page_custom_css .='@media screen and (max-width:575px){';
		$vw_landing_page_custom_css .='.header-fixed{';
			$vw_landing_page_custom_css .='position:static;';
		$vw_landing_page_custom_css .='} }';
	}

	$vw_landing_page_resp_slider = get_theme_mod( 'vw_landing_page_resp_slider_hide_show',false);
	if($vw_landing_page_resp_slider == true && get_theme_mod( 'vw_landing_page_slider_hide_show', false) == false){
    	$vw_landing_page_custom_css .='#slider{';
			$vw_landing_page_custom_css .='display:none;';
		$vw_landing_page_custom_css .='} ';
	}
    if($vw_landing_page_resp_slider == true){
    	$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='#slider{';
			$vw_landing_page_custom_css .='display:block;';
		$vw_landing_page_custom_css .='} }';
	}else if($vw_landing_page_resp_slider == false){
		$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='#slider{';
			$vw_landing_page_custom_css .='display:none;';
		$vw_landing_page_custom_css .='} }';
	}

	$vw_landing_page_resp_sidebar = get_theme_mod( 'vw_landing_page_sidebar_hide_show',true);
    if($vw_landing_page_resp_sidebar == true){
    	$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='#sidebar{';
			$vw_landing_page_custom_css .='display:block;';
		$vw_landing_page_custom_css .='} }';
	}else if($vw_landing_page_resp_sidebar == false){
		$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='#sidebar{';
			$vw_landing_page_custom_css .='display:none;';
		$vw_landing_page_custom_css .='} }';
	}

	$vw_landing_page_resp_scroll_top = get_theme_mod( 'vw_landing_page_resp_scroll_top_hide_show',true);
	if($vw_landing_page_resp_scroll_top == true && get_theme_mod( 'vw_landing_page_hide_show_scroll',true) != true){
    	$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='visibility:hidden !important;';
		$vw_landing_page_custom_css .='} ';
	}
    if($vw_landing_page_resp_scroll_top == true){
    	$vw_landing_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='visibility:visible !important;';
		$vw_landing_page_custom_css .='} }';
	}else if($vw_landing_page_resp_scroll_top == false){
		$vw_landing_page_custom_css .='@media screen and (max-width:575px){';
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='visibility:hidden !important;';
		$vw_landing_page_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_landing_page_topbar_padding_top_bottom = get_theme_mod('vw_landing_page_topbar_padding_top_bottom');
	if($vw_landing_page_topbar_padding_top_bottom != false){
		$vw_landing_page_custom_css .='#topbar{';
			$vw_landing_page_custom_css .='padding-top: '.esc_attr($vw_landing_page_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_landing_page_topbar_padding_top_bottom).';';
		$vw_landing_page_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_landing_page_sticky_header_padding = get_theme_mod('vw_landing_page_sticky_header_padding');
	if($vw_landing_page_sticky_header_padding != false){
		$vw_landing_page_custom_css .='.header-fixed{';
			$vw_landing_page_custom_css .='padding: '.esc_attr($vw_landing_page_sticky_header_padding).';';
		$vw_landing_page_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_landing_page_search_padding_top_bottom = get_theme_mod('vw_landing_page_search_padding_top_bottom');
	$vw_landing_page_search_padding_left_right = get_theme_mod('vw_landing_page_search_padding_left_right');
	$vw_landing_page_search_font_size = get_theme_mod('vw_landing_page_search_font_size');
	$vw_landing_page_search_border_radius = get_theme_mod('vw_landing_page_search_border_radius');
	if($vw_landing_page_search_padding_top_bottom != false || $vw_landing_page_search_padding_left_right != false || $vw_landing_page_search_font_size != false || $vw_landing_page_search_border_radius != false){
		$vw_landing_page_custom_css .='.search-box i{';
			$vw_landing_page_custom_css .='padding-top: '.esc_attr($vw_landing_page_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_landing_page_search_padding_top_bottom).';padding-left: '.esc_attr($vw_landing_page_search_padding_left_right).';padding-right: '.esc_attr($vw_landing_page_search_padding_left_right).';font-size: '.esc_attr($vw_landing_page_search_font_size).';border-radius: '.esc_attr($vw_landing_page_search_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_landing_page_button_padding_top_bottom = get_theme_mod('vw_landing_page_button_padding_top_bottom');
	$vw_landing_page_button_padding_left_right = get_theme_mod('vw_landing_page_button_padding_left_right');
	if($vw_landing_page_button_padding_top_bottom != false || $vw_landing_page_button_padding_left_right != false){
		$vw_landing_page_custom_css .='.post-main-box .view-more{';
			$vw_landing_page_custom_css .='padding-top: '.esc_attr($vw_landing_page_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_landing_page_button_padding_top_bottom).';padding-left: '.esc_attr($vw_landing_page_button_padding_left_right).';padding-right: '.esc_attr($vw_landing_page_button_padding_left_right).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_button_border_radius = get_theme_mod('vw_landing_page_button_border_radius');
	if($vw_landing_page_button_border_radius != false){
		$vw_landing_page_custom_css .='.post-main-box .view-more{';
			$vw_landing_page_custom_css .='border-radius: '.esc_attr($vw_landing_page_button_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_landing_page_single_blog_post_navigation_show_hide = get_theme_mod('vw_landing_page_single_blog_post_navigation_show_hide',true);
	if($vw_landing_page_single_blog_post_navigation_show_hide != true){
		$vw_landing_page_custom_css .='.post-navigation{';
			$vw_landing_page_custom_css .='display: none;';
		$vw_landing_page_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_landing_page_copyright_font_size = get_theme_mod('vw_landing_page_copyright_font_size');
	if($vw_landing_page_copyright_font_size != false){
		$vw_landing_page_custom_css .='.copyright p{';
			$vw_landing_page_custom_css .='font-size: '.esc_attr($vw_landing_page_copyright_font_size).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_copyright_padding_top_bottom = get_theme_mod('vw_landing_page_copyright_padding_top_bottom');
	if($vw_landing_page_copyright_padding_top_bottom != false){
		$vw_landing_page_custom_css .='#footer-2{';
			$vw_landing_page_custom_css .='padding-top: '.esc_attr($vw_landing_page_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_landing_page_copyright_padding_top_bottom).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_copyright_alignment = get_theme_mod('vw_landing_page_copyright_alignment');
	if($vw_landing_page_copyright_alignment != false){
		$vw_landing_page_custom_css .='.copyright p{';
			$vw_landing_page_custom_css .='text-align: '.esc_attr($vw_landing_page_copyright_alignment).';';
		$vw_landing_page_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_landing_page_scroll_to_top_font_size = get_theme_mod('vw_landing_page_scroll_to_top_font_size');
	if($vw_landing_page_scroll_to_top_font_size != false){
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='font-size: '.esc_attr($vw_landing_page_scroll_to_top_font_size).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_scroll_to_top_padding = get_theme_mod('vw_landing_page_scroll_to_top_padding');
	$vw_landing_page_scroll_to_top_padding = get_theme_mod('vw_landing_page_scroll_to_top_padding');
	if($vw_landing_page_scroll_to_top_padding != false){
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='padding-top: '.esc_attr($vw_landing_page_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_landing_page_scroll_to_top_padding).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_scroll_to_top_width = get_theme_mod('vw_landing_page_scroll_to_top_width');
	if($vw_landing_page_scroll_to_top_width != false){
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='width: '.esc_attr($vw_landing_page_scroll_to_top_width).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_scroll_to_top_height = get_theme_mod('vw_landing_page_scroll_to_top_height');
	if($vw_landing_page_scroll_to_top_height != false){
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='height: '.esc_attr($vw_landing_page_scroll_to_top_height).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_scroll_to_top_border_radius = get_theme_mod('vw_landing_page_scroll_to_top_border_radius');
	if($vw_landing_page_scroll_to_top_border_radius != false){
		$vw_landing_page_custom_css .='.scrollup i{';
			$vw_landing_page_custom_css .='border-radius: '.esc_attr($vw_landing_page_scroll_to_top_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_landing_page_social_icon_font_size = get_theme_mod('vw_landing_page_social_icon_font_size');
	if($vw_landing_page_social_icon_font_size != false){
		$vw_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_landing_page_custom_css .='font-size: '.esc_attr($vw_landing_page_social_icon_font_size).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_social_icon_padding = get_theme_mod('vw_landing_page_social_icon_padding');
	if($vw_landing_page_social_icon_padding != false){
		$vw_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_landing_page_custom_css .='padding: '.esc_attr($vw_landing_page_social_icon_padding).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_social_icon_width = get_theme_mod('vw_landing_page_social_icon_width');
	if($vw_landing_page_social_icon_width != false){
		$vw_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_landing_page_custom_css .='width: '.esc_attr($vw_landing_page_social_icon_width).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_social_icon_height = get_theme_mod('vw_landing_page_social_icon_height');
	if($vw_landing_page_social_icon_height != false){
		$vw_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_landing_page_custom_css .='height: '.esc_attr($vw_landing_page_social_icon_height).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_social_icon_border_radius = get_theme_mod('vw_landing_page_social_icon_border_radius');
	if($vw_landing_page_social_icon_border_radius != false){
		$vw_landing_page_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_landing_page_custom_css .='border-radius: '.esc_attr($vw_landing_page_social_icon_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_landing_page_products_padding_top_bottom = get_theme_mod('vw_landing_page_products_padding_top_bottom');
	if($vw_landing_page_products_padding_top_bottom != false){
		$vw_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_landing_page_custom_css .='padding-top: '.esc_attr($vw_landing_page_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_landing_page_products_padding_top_bottom).'!important;';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_products_padding_left_right = get_theme_mod('vw_landing_page_products_padding_left_right');
	if($vw_landing_page_products_padding_left_right != false){
		$vw_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_landing_page_custom_css .='padding-left: '.esc_attr($vw_landing_page_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_landing_page_products_padding_left_right).'!important;';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_products_box_shadow = get_theme_mod('vw_landing_page_products_box_shadow');
	if($vw_landing_page_products_box_shadow != false){
		$vw_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_landing_page_custom_css .='box-shadow: '.esc_attr($vw_landing_page_products_box_shadow).'px '.esc_attr($vw_landing_page_products_box_shadow).'px '.esc_attr($vw_landing_page_products_box_shadow).'px #ddd;';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_products_border_radius = get_theme_mod('vw_landing_page_products_border_radius', 0);
	if($vw_landing_page_products_border_radius != false){
		$vw_landing_page_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_landing_page_custom_css .='border-radius: '.esc_attr($vw_landing_page_products_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_products_button_border_radius = get_theme_mod('vw_landing_page_products_button_border_radius', 0);
	if($vw_landing_page_products_button_border_radius != false){
		$vw_landing_page_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_landing_page_custom_css .='border-radius: '.esc_attr($vw_landing_page_products_button_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_woocommerce_sale_font_size = get_theme_mod('vw_landing_page_woocommerce_sale_font_size');
	if($vw_landing_page_woocommerce_sale_font_size != false){
		$vw_landing_page_custom_css .='.woocommerce span.onsale{';
			$vw_landing_page_custom_css .='font-size: '.esc_attr($vw_landing_page_woocommerce_sale_font_size).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_woocommerce_sale_border_radius = get_theme_mod('vw_landing_page_woocommerce_sale_border_radius', 0);
	if($vw_landing_page_woocommerce_sale_border_radius != false){
		$vw_landing_page_custom_css .='.woocommerce span.onsale{';
			$vw_landing_page_custom_css .='border-radius: '.esc_attr($vw_landing_page_woocommerce_sale_border_radius).'px;';
		$vw_landing_page_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_landing_page_site_title_font_size = get_theme_mod('vw_landing_page_site_title_font_size');
	if($vw_landing_page_site_title_font_size != false){
		$vw_landing_page_custom_css .='.logo h1, .logo p.site-title{';
			$vw_landing_page_custom_css .='font-size: '.esc_attr($vw_landing_page_site_title_font_size).';';
		$vw_landing_page_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_landing_page_site_tagline_font_size = get_theme_mod('vw_landing_page_site_tagline_font_size');
	if($vw_landing_page_site_tagline_font_size != false){
		$vw_landing_page_custom_css .='.logo p.site-description{';
			$vw_landing_page_custom_css .='font-size: '.esc_attr($vw_landing_page_site_tagline_font_size).';';
		$vw_landing_page_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_landing_page_preloader_bg_color = get_theme_mod('vw_landing_page_preloader_bg_color');
	if($vw_landing_page_preloader_bg_color != false){
		$vw_landing_page_custom_css .='#preloader{';
			$vw_landing_page_custom_css .='background-color: '.esc_attr($vw_landing_page_preloader_bg_color).';';
		$vw_landing_page_custom_css .='}';
	}

	$vw_landing_page_preloader_border_color = get_theme_mod('vw_landing_page_preloader_border_color');
	if($vw_landing_page_preloader_border_color != false){
		$vw_landing_page_custom_css .='.loader-line{';
			$vw_landing_page_custom_css .='border-color: '.esc_attr($vw_landing_page_preloader_border_color).'!important;';
		$vw_landing_page_custom_css .='}';
	}