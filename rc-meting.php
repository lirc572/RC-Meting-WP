<?php

/**
 * @link              https://github.com/lirc572/RC-Meting-WP
 * @since             1.0.4
 * @package           RC-Meting
 *
 * @wordpress-plugin
 * Plugin Name:       RC-Meting
 * Plugin URI:        https://github.com/lirc572/RC-Meting-WP
 * Description:       MetingJS wrapper
 * Version:           1.0.4
 * Author:            <a href="https://github.com/lirc572">lirc572</a>
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('RC_METING_VERSION', '1.0.4');

class_exists('Rc_Meting') || require_once 'include/rc-meting-class.php';
new Rc_Meting(RC_METING_VERSION);