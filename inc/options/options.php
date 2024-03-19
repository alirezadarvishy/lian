<?php
/**
 * Lian Options Panel
 */

if ( ! defined( 'ABSPATH' ) ) exit;

use Lian\DynamicCodes;
use Lian\ApiHelper;

if ( ! class_exists( 'LIAN_Theme_Dashboard' ) ) {

	class LIAN_Theme_Dashboard {

		public function __construct() {

			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'LIAN_Theme_Dashboard', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'LIAN_Theme_Dashboard', 'register_settings' ) );
			}

		}

		public static function get_lian_options() {
			return get_option( 'lian_options' );
		}

		public static function get_theme_option( $id ) {
			$options = self::get_lian_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		public static function add_admin_menu() {
			$menu_name = "Lian";
			$lian_new_version = !empty(get_option('lian_new_version')) ? get_option( 'lian_new_version') : LIAN_VERSION;
			if(version_compare(LIAN_VERSION,$lian_new_version,'<')){
				$menu_name .= '<span title="Update Available" class="update-plugins count-1"><span class="update-count">1</span></span>';
			}
			add_menu_page(
				$menu_name,
				$menu_name,
				'manage_options',
				'lian-dashboard',
				array( 'LIAN_Theme_Dashboard', 'lian_dashboard_page' ),
				'dashicons-plus',
				4
			);
			
			add_submenu_page(
				'lian-dashboard',
				__( 'Elementor Editor', 'lian' ),
				__( 'Elementor Editor', 'lian' ),
				'manage_options',
				'lian-elementor',
				array( 'LIAN_Theme_Dashboard', 'lian_elementor_editor_page' ),
				2	
			);

			add_submenu_page(
				'lian-dashboard',
				__( 'Settings', 'lian' ),
				__( 'Settings', 'lian' ),
				'manage_options',
				'lian-settings',
				array( 'LIAN_Theme_Dashboard', 'lian_admin_page' ),
				7
			);
			
		}

		public static function register_settings() {
			register_setting( 'lian_options', 'lian_options', array( 'LIAN_Theme_Dashboard', 'sanitize' ) );

			// Generate CSS & JS file
			$css_codes = DynamicCodes::lian_dynamic_css();
			if(function_exists('lian_core_dynamic_css_create_file')){
			    lian_core_dynamic_css_create_file($css_codes);
			}

			$js_codes = DynamicCodes::lian_dynamic_js();
			if(function_exists('lian_core_dynamic_js_create_file')){
			    lian_core_dynamic_js_create_file($js_codes);
			}
		}

		public static function sanitize( $options ) {

			return $options;
		}

		/**
		* Lian Elementor Editor Page
		* @author Alireza Dr.
		*/
		public static function lian_dashboard_page(){
			?>
			<div class="lian-wrap">
				<div class="container lian-dashboard">
					<div class="row">
						<div class="col">
							<div class="col-content mb-16">
								<b><?php echo sprintf( __('Welcome to Lian Version %s, enjoy!', 'lian'), LIAN_VERSION); ?></b>
								<p><?php _e( 'Unlock the potential of Lian to turn your dreams into a digital masterpiece!', 'lian' ); ?></p>
							</div>
						</div>
						<div class="col">
							<div class="col-content mb-16 revert-colors elementor-box">
								<b><img src="<?php echo LIAN_ASSETS_URI . 'img/elementor-logo-w.png';?>" width="200"></b>
								<p><?php _e( 'Change headers, footers, pages and everything with Elementor. Are yo ready?', 'lian'); ?></p>
								<a href="?page=lian-elementor" class="btn btn-primary dib mt-16"><?php _e('Elementor Editor', 'lian' ); ?></a>
							</div>
						</div>
						<div class="col">
							<div class="col-content mb-16">
								<b><?php _e( 'Lian Settings', 'lian' ); ?></b>
								<p><?php _e('The most comprehensive settings are provided so that the template is in your hands.', 'lian'); ?></p>
								<a href="?page=lian-settings" class="btn btn-primary dib mt-16"><?php _e('Theme Settings', 'lian'); ?></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="col-content mb-16 <?php echo esc_attr($update_available_class); ?>">
								<b><?php _e( 'Updates', 'lian' ); ?></b>
								<?php
    								$theme_information = new ApiHelper();
    								$lian_new_version = $theme_information->get_lian_theme_version();
    								if(!$lian_new_version || LIAN_VERSION >= $lian_new_version): ?>
        									<p><?php _e( 'Your theme is up to date. Enjoy!', 'lian' ); ?></p>
        								<?php else: ?>
        									<p><?php _e( 'Version', 'lian' ); ?> <?php echo esc_attr($lian_new_version); ?> <?php _e( 'is now Available!!', 'lian' ); ?></p>
    								<?php endif; ?>
							</div>
						</div>
						<div class="col">
							<div class="col-content mb-16">
								<b><?php _e( 'Support', 'lian' ); ?></b>
								<p><?php _e( 'You can request support and send a ticket at any hour of the day and night so that the first operator will check your problem and answer you as soon as possible.', 'lian' ); ?></p>
								<a href="<?php _e('https://wipna.com/dashboard/', 'lian'); ?>" class="btn btn-primary dib mt-16"><?php _e( 'Send a Request', 'lian' ); ?></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="col-content mb-16">
								<b><?php _e( 'Documentation', 'lian' ); ?></b>
								<p><?php _e( 'The Documentation is a comprehensive resource that can significantly enhance your proficiency with the Lian theme, guiding you on how to customize it to suit your specific needs and work more effectively with it.', 'lian' ); ?></p>
								<a href="<?php _e('https://docs.wipna.com/lian/', 'lian'); ?>" class="btn btn-primary dib mt-16" target="_blank"><?php _e( 'See Online Documentation', 'lian' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
		}

		
		/**
		* Lian Elementor Editor Page
		* @author Alireza Dr.
		*/
		public static function lian_elementor_editor_page(){
			?>
				<div class="lian-wrap" style="margin-top:20px;">
					<div class="lian-overlay-options"></div>
					<div class="lian-save" style="display:none">
						<div class="doing" style="display:none"><span><?php echo _e('Saving...','lian'); ?></span></div>
						<div class="succ" style="display:none"><span><?php echo _e('Saved!','lian'); ?></span></div>
						<div class="fail" style="display:none"><span><?php echo _e('Failed!','lian'); ?></span></div>
					</div>
					<form method="post" action="options.php">
	
						<?php settings_fields( 'lian_options' ); ?>
						<div class="lian-options">
							<div class="lian-options-sidebar">
								<center style=" padding-bottom: 15px; ">
									<div style="width: 100%;">
									<embed src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/assets/img/logo.png'); ?>"/>
									<span class="version"><?php echo 'v'.LIAN_VERSION; ?></span>
									</div>
								</center>
								<ul>
									<li class="active"><i class="dashicons dashicons-table-row-before"></i><?php _e( 'Header', 'lian' ); ?></li>
									<li><i class="dashicons dashicons-table-row-after"></i><?php _e( 'Footer', 'lian' ); ?></li>
									<li><i class="dashicons dashicons-schedule"></i><?php _e( 'Pages', 'lian' ); ?></li>
									<li><i class="dashicons dashicons-menu-alt3"></i><?php _e( 'Mega Menu', 'lian' ); ?></li>
								</ul>
							</div>
							<div class="lian-options-content">
								<?php if(lian_is_core_activated() && lian_is_elementor_activated()): ?>
									<ul class="lian-elementor-posts">
									<?php include 'elementor-editor/frontend/header.php'; ?>
									<?php include 'elementor-editor/frontend/footer.php'; ?>
									<?php include 'elementor-editor/frontend/pages.php'; ?>
									<?php include 'elementor-editor/frontend/megamenu.php'; ?>
									</ul>
								<?php else: ?>
									<div>
										<?php if(!lian_is_core_activated()): ?>
											<div class="notice lian-notice">
												<?php _e('<a href="https://wipna.com/lian-core/" target="_blank">Lian Core</a> plugin is required for this section. <a href="https://wipna.com/lian-core/" target="_blank">Click Here to get the Lian Core plugin right now!</a>','lian'); ?>
											</div>
										<?php endif; ?>

										<?php if(!lian_is_elementor_activated()): ?>
											<div class="notice lian-notice">
												<?php _e('Free Elementor plugin is required for this section. Please install and activate the Elementor plugin through Plugins » Add Plugin.','lian'); ?>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</form>
				</div>
			<?php
		}


		/**
		* Lian Settings Page
		* @author Alireza Dr.
		*/
		public static function lian_admin_page() {
			?>
				<div class="lian-wrap" style="margin-top:20px;">
					<div class="lian-overlay-options"></div>
					<div class="lian-save" style="display:none">
						<div class="doing" style="display:none"><span><?php echo _e('Saving...','lian'); ?></span></div>
						<div class="succ" style="display:none"><span><?php echo _e('Saved!','lian'); ?></span></div>
						<div class="fail" style="display:none"><span><?php echo _e('Failed!','lian'); ?></span></div>
					</div>
					<form method="post" action="options.php">
	
						<?php settings_fields( 'lian_options' ); ?>
						<div class="lian-options">
							<div class="lian-options-sidebar">
								<center style=" padding-bottom: 15px; ">
									<div style="width: 100%;">
									<embed src="<?php echo esc_url(get_template_directory_uri() . '/inc/options/assets/img/logo.png'); ?>"/>
									<span class="version"><?php echo 'v'.LIAN_VERSION; ?></span>
									</div>
								</center>
								<ul>
									<li class="active"><i class="dashicons-before dashicons-dashboard"></i><?php _e( 'General', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-admin-appearance"></i><?php _e( 'Style', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-editor-textcolor"></i><?php _e( 'Typography', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-schedule"></i><?php _e( 'Header', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-layout"></i><?php _e( 'Footer', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-format-aside"></i><?php _e( 'Blog / Archive - Single', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-portfolio"></i><?php _e( 'Portfolio / Archive - Single', 'lian' ); ?></li>
									<li><i class="dashicons-before dashicons-info-outline"></i><?php _e( '404 page', 'lian' ); ?></li>
								</ul>
								<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Options','lian'); ?>"></p>
							</div>
							<div class="lian-options-content">
								<ul>
									<?php include 'settings/frontend/options-general.php'; ?>
									<?php include 'settings/frontend/options-style.php'; ?>
									<?php include 'settings/frontend/options-typography.php'; ?>
									<?php include 'settings/frontend/options-header.php'; ?>
									<?php include 'settings/frontend/options-footer.php'; ?>
									<?php include 'settings/frontend/options-blog.php'; ?>
									<?php include 'settings/frontend/options-portfolio.php'; ?>
									<?php include 'settings/frontend/options-notfound.php'; ?>
								</ul>
							</div>
	
						</div>
	
					</form>
	
				</div>
			<?php 
			}

	}
}
new LIAN_Theme_Dashboard;
// to return a value
function lian_options( $id = '' ) {
	return LIAN_Theme_Dashboard::get_theme_option( $id );
}
