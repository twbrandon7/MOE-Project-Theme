<?php
/** Step 2 (from text above). */
add_action( 'admin_menu', 'theme_menu' );

/** Step 1. */
function theme_menu() {
    add_theme_page( '佈景設定', '佈景設定', 'manage_options', 'niu-lc-theme', 'theme_options' );
    register_theme_settings();
}

/** Step 3. */
function theme_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    include( locate_template( 'admin/setting_form.php', false, false ) ); 
}

function register_theme_settings() { // whitelist options
    register_setting( 'home_setting', 'index_gallery_image_ids' );
    register_setting( 'home_setting', 'index_page_id' );
    //register_setting( 'home_setting', 'option_etc' );
}
?>