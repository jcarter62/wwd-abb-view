<?php
/**
 * @Author WWD
 * @Copyright (c) 2018. Westlands Water District. (https://wwd.ca.gov)
 * This code is released under the GPL licence version 3 or later, available here
 * http://www.gnu.org/licenses/gpl.txt
 *
 */

/**
Plugin Name: Wwd Abb View
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: jcarter
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

if (!defined('WWD_ABB_VIEW_DIR')) {
    define('WWD_ABB_VIEW_DIR', dirname(__FILE__));
}

require WWD_ABB_VIEW_DIR . '/options/wwd_abb_settings.php';

require WWD_ABB_VIEW_DIR . '/class/include.php';


