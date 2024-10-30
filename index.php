<?php
/**
 * Plugin Name: Karzar
 * Plugin URI: https://wordpress.com/plugins/karzar/
 * Description: پلاگین پلتفرم کارزار برای جمع آوری امضا الکترونیکی
 * Version: 1.0.0
 * Author: متین بیگی,سپهر رحیم پور
 * Author URI: https://matinbeigi.ir
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'MBWP_Karzar' ) ) {

    define( 'MBWP_ESL_VERSION', '1.0.0' );
    define( 'MBWP_ESL_NAME', plugin_basename( __FILE__ ) );
    define( 'MBWP_ESL_DIR', plugin_dir_path( __FILE__ ) );
    define( 'MBWP_ESL_URI', plugin_dir_url( __FILE__ ) );
    define( 'MBWP_ESL_TPL', trailingslashit( MBWP_ESL_DIR . 'templates' ) );
    define( 'MBWP_ESL_class', trailingslashit( MBWP_ESL_DIR . 'class' ) );
	include MBWP_ESL_class . 'mb.php';

	

    class MBWP_Karzar {

		public function __construct() {
            // Add option page
            add_action( 'admin_menu', array( $this, 'mbwp_esl_option_page' ) );

            // Register settings
            add_action( 'admin_init', array( $this, 'mbwp_esl_register_settings' ) );

            // Add settings link
            add_filter( 'plugin_action_links_' . MBWP_ESL_NAME, array( $this, 'mbwp_esl_add_settings_link' ) );

           
            // Avoid Text widget rel changes
            add_filter( 'wp_targeted_link_rel', array( $this, 'mbwp_avoid_text_widget_rel' ) , 99, 2 );
        }

        function mbwp_esl_option_page() {
            add_submenu_page(
                'options-general.php',
                'کارزار',
                'کارزار',
                'manage_options',
                'karzar',
                array( 
                    $this,
                    'mbwp_esl_option_page_callback'
                ) 
            );
        }

        function mbwp_esl_register_settings() {
            register_setting( 'mbwp-esl-settings-group', 'mbwp_internet' );
            register_setting( 'mbwp-esl-settings-group', 'title-site-karzar' );
            
        }

        function mbwp_esl_option_page_callback() {
            include MBWP_ESL_TPL . 'option-page.php';
        }

        function mbwp_esl_add_settings_link( $links ) {
            $links[] = '<a href="' . admin_url( 'options-general.php?page=karzar' ) . '">تنظیمات</a>';
            $links[] = '<a href="https://matinbeigi.ir">سایت سازنده</a>';

            return $links;
        }




	}

    new MBWP_Karzar();
}