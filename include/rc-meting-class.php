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
        }
        public function rc_meting_shortcode($atts)
        {
            extract(shortcode_atts(array(
                'auto' => '',
                'fixed' => false,
                'mini' => false,
                'autoplay' => false,
                'theme' => '#4C5243', // #LRC
                'loop' => 'all',
                'order' => 'list',
            ), $atts));
            $auto = htmlspecialchars($auto);
            return '<p><meting-js auto="'
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
                . '">'
                . '</meting-js></p>';
        }
        public function rc_meting_scripts()
        {
            wp_enqueue_style('aplayer-css', $this->aplayer_css_url, array(), $this->aplayer_ver);
            wp_enqueue_script('aplayer-js', $this->aplayer_js_url, array(), $this->aplayer_ver, true);
            wp_enqueue_script('meting-js', $this->meting_js_url, array('aplayer-js'), $this->meting_ver, true);
        }
    }
}
