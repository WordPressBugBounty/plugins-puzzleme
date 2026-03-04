<?php
if (!defined('ABSPATH')) {
    exit;
}

class PuzzleMe_Admin
{
    const MENU_SLUG = 'puzzleme-dashboard';
    const URL_LOGIN = 'https://puzzleme.amuselabs.com/pmm/login';
    const URL_SUPPORTED_GAMES = 'https://amuselabs.com/games/';
    const URL_PRICING = 'https://amuselabs.com/pricing';
    const URL_CONTACT = 'https://amuselabs.com/contact-us';
    const URL_REVIEW = 'https://wordpress.org/support/plugin/puzzleme/reviews/#new-post';

    private $plugin_url;

    public function __construct($plugin_file)
    {
        $this->plugin_url = plugin_dir_url($plugin_file);
        add_action('admin_menu', array($this, 'register_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function register_menu()
    {
        add_options_page(
            'PuzzleMe',
            'PuzzleMe',
            'manage_options',
            self::MENU_SLUG,
            array($this, 'render_page')
        );
    }

    public function enqueue_assets($hook_suffix)
    {
        if ('settings_page_' . self::MENU_SLUG !== $hook_suffix) {
            return;
        }

        $css_url = apply_filters('puzzleme_admin_css_url', $this->plugin_url . 'admin/assets/css/puzzleme-admin.css');
        $js_url = apply_filters('puzzleme_admin_js_url', $this->plugin_url . 'admin/assets/js/puzzleme-admin.js');

        if (!empty($css_url)) {
            wp_enqueue_style(
                'puzzleme-admin',
                esc_url($css_url),
                array(),
                defined('PUZZLEME_PLUGIN_VERSION') ? PUZZLEME_PLUGIN_VERSION : null
            );
        }

        if (!empty($js_url)) {
            wp_enqueue_script(
                'puzzleme-admin',
                esc_url($js_url),
                array(),
                defined('PUZZLEME_PLUGIN_VERSION') ? PUZZLEME_PLUGIN_VERSION : null,
                true
            );
        }
    }

    public function render_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die(esc_html('You do not have sufficient permissions to access this page.'));
        }

        require plugin_dir_path(__FILE__) . 'views/admin-page.php';
    }
}
