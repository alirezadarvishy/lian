<?php
namespace Lian;

if ( ! defined( 'ABSPATH' ) ) exit;

class ApiHelper{
            
        public $wordpress_api;

        public function __construct(){
            $this->wordpress_api  = 'https://api.wordpress.org/themes/info/1.1/';
        }
        
        public function wordpress_api($parameters = []){

            if(empty($parameters)){
                $parameters = array(
                    'action' => 'theme_information',
                    'request' => array('slug' => 'lian')
                );
            }
            
            $request_params = array(
                'body' => $parameters
            );
            
            $response = wp_safe_remote_post($this->wordpress_api, $request_params);
            
            if (is_wp_error($response)) {
                return 'false';
            } else {
                $response_body = wp_remote_retrieve_body($response);
                $json_data = json_decode($response_body, true);
                    
                if ($json_data === null) {
                    return 'false';
                } else {
                    return $json_data;
                }
            }
        }
        
        public function get_lian_theme_version(){
            $theme_information = $this->wordpress_api();
            if(!empty($theme_information) and $theme_information !== "false"){
                $version = isset($theme_information['version']) ? $theme_information['version']: false;
                
                return $version;
            }
            return false;
        }
}