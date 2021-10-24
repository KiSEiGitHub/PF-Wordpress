<?php
//about theme info
add_action( 'admin_menu', 'vw_one_page_gettingstarted' );
function vw_one_page_gettingstarted() {    	
	add_theme_page( esc_html__('About VW One Page', 'vw-one-page'), esc_html__('About VW One Page', 'vw-one-page'), 'edit_theme_options', 'vw_one_page_guide', 'vw_one_page_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_one_page_admin_theme_style() {
   wp_enqueue_style('vw-one-page-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-one-page-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_one_page_admin_theme_style');

//guidline for about theme
function vw_one_page_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-one-page' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW One Page Theme', 'vw-one-page' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-one-page'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW One Page at 20% Discount','vw-one-page'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-one-page'); ?> ( <span><?php esc_html_e('vwpro20','vw-one-page'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_ONE_PAGE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-one-page' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_one_page_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-one-page' ); ?></button>
			<button class="tablinks" onclick="vw_one_page_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-one-page' ); ?></button>
			<button class="tablinks" onclick="vw_one_page_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-one-page' ); ?></button>
			<button class="tablinks" onclick="vw_one_page_open_tab(event, 'one_pro')"><?php esc_html_e( 'Get Premium', 'vw-one-page' ); ?></button>
			<button class="tablinks" onclick="vw_one_page_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-one-page' ); ?></button>
		</div>

		<?php
			$vw_one_page_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_one_page_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_One_Page_Plugin_Activation_Settings::get_instance();
				$vw_one_page_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-one-page-recommended-plugins">
				    <div class="vw-one-page-action-list">
				        <?php if ($vw_one_page_actions): foreach ($vw_one_page_actions as $key => $vw_one_page_actionValue): ?>
				                <div class="vw-one-page-action" id="<?php echo esc_attr($vw_one_page_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_one_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_one_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_one_page_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-one-page'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_one_page_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-one-page' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW One Page is a creatively crafted, polished and eye-catching multipurpose one page WordPress theme. It is the best fit for business and corporate website, landing page, portfolio, blog, personal website, firms, enterprises, local business and many other websites for different niches of businesses. It is a responsive theme made with mobile-first approach to load perfectly on mobiles, tablets and desktops of varying sizes. It is compatible on multiple browsers and can be translated into as many as 70 different languages. This one page WordPress theme is optimized for search engines to give good traffic input to your site. With plethora of styling options of header, footer, gallery and sidebars, it promises to give your website a unique look and make it outstanding. Further, banners and sliders are provided to add beauty to it. Made from scratch, it stands firm on Bootstrap framework which makes an easy way for its usage. This one page WordPress theme gives all the power to design a website according to your specifications with its advanced customization tool. It has social media icons to make your website reach people easily. It is lightweight and compatible with third party plugins.','vw-one-page'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-one-page' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-one-page' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_ONE_PAGE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-one-page' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-one-page'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-one-page'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-one-page'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-one-page'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-one-page'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_ONE_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-one-page'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-one-page'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-one-page'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_ONE_PAGE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-one-page'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-one-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-one-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-one-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Section','vw-one-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_service_section') ); ?>" target="_blank"><?php esc_html_e('Services','vw-one-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-edit"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_about_section') ); ?>" target="_blank"><?php esc_html_e('About Us','vw-one-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-one-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-one-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-one-page'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-one-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-one-page'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-one-page'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-one-page'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-one-page'); ?></span><?php esc_html_e(' Go to ','vw-one-page'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-one-page'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-one-page'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-one-page'); ?></span><?php esc_html_e(' Go to ','vw-one-page'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-one-page'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-one-page'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-one-page'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-one-page/" target="_blank"><?php esc_html_e('Documentation','vw-one-page'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_One_Page_Plugin_Activation_Settings::get_instance();
			$vw_one_page_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-one-page-recommended-plugins">
				    <div class="vw-one-page-action-list">
				        <?php if ($vw_one_page_actions): foreach ($vw_one_page_actions as $key => $vw_one_page_actionValue): ?>
				                <div class="vw-one-page-action" id="<?php echo esc_attr($vw_one_page_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_one_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_one_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_one_page_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-one-page'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_one_page_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-one-page' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-one-page'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-one-page'); ?></span></b></p>
	              	<div class="vw-one-page-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-one-page'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-one-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-one-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-one-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-one-page'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-one-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-one-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-one-page'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-one-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-one-page'); ?></a>
								</div> 
							</div>
						</div>
				</div>					
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_One_Page_Plugin_Activation_Settings::get_instance();
			$vw_one_page_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-one-page-recommended-plugins">
				    <div class="vw-one-page-action-list">
				        <?php if ($vw_one_page_actions): foreach ($vw_one_page_actions as $key => $vw_one_page_actionValue): ?>
				                <div class="vw-one-page-action" id="<?php echo esc_attr($vw_one_page_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_one_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_one_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_one_page_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-one-page' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-one-page-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-one-page'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-one-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-one-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-one-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-one-page'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-one-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-one-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-one-page'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_one_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-one-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-one-page'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="one_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-one-page' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This one page WordPress theme is versatile, attention-grabbing and robust with a dynamic attitude. It is made for business and corporate sites, landing pages, portfolios, blogs, personal websites, local firms and enterprises, agencies and for a wide range of other businesses that donot want a complicated website instead looking for an elegant one. It depicts the professional approach you carry in your business with its beautiful and formal design. It offers so many styles for header, footer, gallery and sidebar that you can use in various combinations to get a stunning and visually appealing website. This one page WordPress theme is accessorized with banners and sliders. Use sliders at any place with as many slides as you want. Its user-friendly interface of back end will make it easy for you to use the theme without knowing a single line of code.','vw-one-page'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_ONE_PAGE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-one-page'); ?></a>
					<a href="<?php echo esc_url( VW_ONE_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-one-page'); ?></a>
					<a href="<?php echo esc_url( VW_ONE_PAGE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-one-page'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-one-page' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-one-page'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-one-page'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-one-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-one-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-one-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-one-page'); ?></td>
								<td class="table-img"><?php esc_html_e('15', 'vw-one-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-one-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-one-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-one-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-one-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-one-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-one-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-one-page'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_ONE_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-one-page'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-one-page'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-one-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ONE_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-one-page'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-one-page'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-one-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ONE_PAGE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-one-page'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-one-page'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-one-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ONE_PAGE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-one-page'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-one-page'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-one-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ONE_PAGE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-one-page'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-one-page'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-one-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_ONE_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-one-page'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>