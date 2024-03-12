<?php
namespace Lian;

if ( ! defined( 'ABSPATH' ) ) exit;

class Import{

    /**
     * Import Theme Options
     * @author Alireza Dr.
     * @param string $file_path
     */
    public static function import_options($file_path){
        
        // Check if the file exists
        if ( file_exists( $file_path ) ) {
            // Read the content of the file
            $options = file_get_contents( $file_path );
        
            // Check if the read operation was successful
            if ( false !== $options ) {
        
                // Check Current Options
                $current_options = get_option('lian_options');
                if($current_options == false){
                    global $wpdb;
                    $options_table = $wpdb->prefix . 'options';
                    $wpdb->replace($options_table,array('option_value' => $options,'option_name' => 'lian_options'),array('%s','%s'));
                }
        
            } else {
                return 'Failed to read file content.';
            }
        } else {
            return 'File does not exist.';
        }
    }

    /**
     * Import Theme Options - Forced
     * @author Alireza Dr.
     * @param string $file_path
     */
    public static function import_options_force($file_path){
       
        // Check if the file exists
        if ( file_exists( $file_path ) ) {
            // Read the content of the file
            $options = file_get_contents( $file_path );
        
            // Check if the read operation was successful
            if ( false !== $options ) {
                
                global $wpdb;
                $options_table = $wpdb->prefix . 'options';
                $wpdb->replace($options_table,array('option_value' => $options,'option_name' => 'lian_options'),array('%s','%s'));
        
            } else {
                return 'Failed to read file content.';
            }
        } else {
            return 'File does not exist.';
        }

    }
}