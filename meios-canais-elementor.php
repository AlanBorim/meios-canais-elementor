<?php

/**
 * Plugin Name: Meios e Canais Elementor
 * Description: Widget personalizado Elementor com layout interativo estilo Meios e Canais.
 * Version: 1.1
 * Author: Alan Borim - Apoio19
 * Author URI: https://apoio19.com.br
 * License: GPL2
 */

function meios_canais_elementor_register_widgets($widgets_manager)
{
    require_once(__DIR__ . '/widgets/meios-canais-widget.php');
    $widgets_manager->register(new \Meios_Canais_Widget());
}
add_action('elementor/widgets/register', 'meios_canais_elementor_register_widgets');

function meios_canais_enqueue_assets()
{
    wp_enqueue_style('meios-canais-style', plugins_url('/assets/style.css', __FILE__), [], filemtime(plugin_dir_path(__FILE__) . 'assets/style.css'));
    wp_enqueue_script('meios-canais-script', plugins_url('/assets/script.js', __FILE__), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'meios_canais_enqueue_assets');
