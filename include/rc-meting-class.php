<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('Rc_Meting')) {
    class Rc_Meting
    {
        public $version;
        public $aplayer_css_url = 'https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.css';
        public $aplayer_js_url = 'https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.js';
        public $aplayer_ver = '1.10.1';
        public $meting_js_url = 'https://cdn.jsdelivr.net/npm/meting@2.0.1/dist/Meting.min.js';
        public $meting_ver = '2.0.1';
        public function __construct($version)
        {
            $this->version = $version;
            add_action('wp_enqueue_scripts', array($this, 'rc_meting_scripts'));
            add_shortcode('rc-meting', array($this, 'rc_meting_shortcode'));
            add_action('admin_menu', array($this, 'rc_meting_options'));
        }
        public function no_referer()
        {
            return '<script>'
                . 'var meta = document.createElement("meta");'
                . 'meta.name = "referrer";'
                . 'meta.content = "no-referrer";'
                . 'document.getElementsByTagName("head")[0].appendChild(meta);'
                . '</script>';
        }
        public function rc_meting_shortcode($atts)
        {
            extract(shortcode_atts($this->get_options(), $atts));
            $auto = htmlspecialchars($auto);
            return ($no_referer === 'true' ? $this->no_referer() : '')
                . '<p><meting-js auto="'
                . $auto
                . '" fixed="'
                . $fixed
                . '" mini="'
                . $mini
                . '" autoplay="'
                . $autoplay
                . '" theme="'
                . $theme
                . '" loop="'
                . $loop
                . '" order="'
                . $order
                . '" list-folded="'
                . $list_folded
                . '">'
                . '</meting-js></p>';
        }
        public function rc_meting_options()
        {
            add_options_page(
                __('RC Meting'),
                __('RC Meting'),
                'manage_options',
                'rc-meting',
                array($this, 'rc_meting_options_page'));
        }
        public function rc_meting_options_page()
        {
            require_once 'rc-meting-options.php';
        }
        public static function get_options()
        {
            return array(
                'no_referer' => get_option('rc_meting_default_no_referer', 'false'),
                'auto' => get_option('rc_meting_default_auto', ''),
                'fixed' => get_option('rc_meting_default_fixed', 'false'),
                'mini' => get_option('rc_meting_default_mini', 'false'),
                'autoplay' => get_option('rc_meting_default_autoplay', 'false'),
                'theme' => get_option('rc_meting_default_theme', '#4C5243'), // #LRC
                'loop' => get_option('rc_meting_default_loop', 'all'),
                'order' => get_option('rc_meting_default_order', 'list'),
                'list_folded' => get_option('rc_meting_default_list_folded', 'true'),
            );
        }
        public static function update_options($options)
        {
            if (isset($options['no_referer'])) {
                update_option('rc_meting_default_no_referer', $options['no_referer']);
            }
            if (isset($options['auto'])) {
                update_option('rc_meting_default_auto', $options['auto']);
            }
            if (isset($options['fixed'])) {
                update_option('rc_meting_default_fixed', $options['fixed']);
            }
            if (isset($options['mini'])) {
                update_option('rc_meting_default_mini', $options['mini']);
            }
            if (isset($options['autoplay'])) {
                update_option('rc_meting_default_autoplay', $options['autoplay']);
            }
            if (isset($options['theme'])) {
                update_option('rc_meting_default_theme', $options['theme']);
            }
            if (isset($options['loop'])) {
                update_option('rc_meting_default_loop', $options['loop']);
            }
            if (isset($options['order'])) {
                update_option('rc_meting_default_order', $options['order']);
            }
            if (isset($options['list_folded'])) {
                update_option('rc_meting_default_list_folded', $options['list_folded']);
            }
        }
        public function rc_meting_scripts()
        {
            wp_enqueue_style('aplayer-css', $this->aplayer_css_url, array(), $this->aplayer_ver);
            wp_enqueue_script('aplayer-js', $this->aplayer_js_url, array(), $this->aplayer_ver, true);
            wp_enqueue_script('meting-js', $this->meting_js_url, array('aplayer-js'), $this->meting_ver, true);
        }
    }
}