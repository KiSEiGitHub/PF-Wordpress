<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="cloudpress-dark-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="cloudpress-dark-info-title text-center"><?php echo esc_html__('About the CloudPress Dark theme','cloudpress-dark'); ?><?php if( !empty($cloudpress_dark['Version']) ): ?> <sup id="cloudpress-dark-theme-version"><?php echo esc_html( $cloudpress_dark['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
				<p><?php esc_html_e( 'This theme is ideal for creating corporate and business websites. The premium version has tons of features: a homepage with many sections where you can feature unlimited slides, portfolios, user reviews, latest news, services, calls to action and much more. Each section in the Homepage template is carefully designed to fit to all business requirements.','cloudpress-dark');?></p>
				<p>
				<?php esc_html_e( 'You can use this theme for any type of activity. CloudPress Dark is compatible with popular plugins like WPML and Polylang.', 'cloudpress-dark' ); ?>
				</p>

				<h1 style="margin-top: 73px !important; font-size:2em !important; background: #0085ba;border-color: #0073aa #006799 #006799; color: #fff; padding: 10px 10px;"><?php esc_html_e( "Getting Started", 'cloudpress-dark' ); ?></h1>
				<div>
				<p style="margin-top: 16px;">

				<?php esc_html_e( 'To take full advantage of all the features this theme has to offer, install and activate the Spice Box plugin. Go to Customize and install the SpiceBox plugin.', 'cloudpress-dark' ); ?>

				</p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" style="padding: 3px 15px;height: 40px; font-size: 16px;"><?php esc_html_e( 'Go to the Customizer','cloudpress-dark');?></a></p>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
				<img src="<?php echo esc_url( CLOUDPRESS_DARK_TEMPLATE_DIR_URI ) . '/admin/img/cloudpress-dark.png'; ?>" alt="<?php esc_attr_e( 'CloudPress Dark theme', 'cloudpress-dark' ); ?>" />
				</div>
			</div>
		</div>

		<div class="row">
    	<div class="col-md-12">
				<div class="cloudpress-dark-tab-center">
					<h1><?php esc_html_e( "Useful Links", 'cloudpress-dark' ); ?></h1>
				</div>
      </div>
			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://cloudpress-dark.spicethemes.com/'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-desktop info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Lite Demo','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://demo.spicethemes.com/?theme=CloudPress%20Pro'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-desktop info-icon"></div>
						<p class="info-text"><?php echo esc_html__('PRO Demo','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/cloudpress-dark/'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-sos info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Theme Support','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/cloudpress-dark'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-smiley info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/cloudpress-pro/'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-book-alt info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Premium Theme Details','cloudpress-dark'); ?></p></a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://helpdoc.spicethemes.com/category/cloudpress/'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-book-alt info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Theme Help Docs','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/cloudpress-free-vs-pro/'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-welcome-write-blog info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Free vs Pro','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="cloudpress-dark-tab-pane-half cloudpress-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/cloudpress-dark-changelog/'); ?>" target="_blank"  class="info-block">
						<div class="dashicons dashicons-portfolio info-icon"></div>
						<p class="info-text"><?php echo esc_html__('Changelog','cloudpress-dark'); ?></p>
					</a>
				</div>
			</div>

		</div>
	</div>
</div>
