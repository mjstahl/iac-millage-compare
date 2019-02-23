<?php
  /**
   * Plugin Name: ICA Millage Compare
   * Description: Calculate and compare taxes based on surrounding millage rates and home value
   * Version: 0.1.0
   * Author: Mark Stahl
   * Author URI: http://github.com/mjstahl
   * License: MIT
   * License URI: https://mit-license.org
   */

  // [ica_millage_compare type="area | city"]
  function ica_render_table ($attrs) {
    $a = shortcode_atts(array(
      'type' => 'area',
    ), $attrs);

    $ica_millage_to_render = 'templates/' . $a['type'] . '.php';
    $ica_renderable_output = require_once($ica_millage_to_render);

    $script_file = plugin_dir_url(__FILE__) . 'scripts/' . $a['type'] . '.js';
    wp_enqueue_script('ica_scripts', $script_file , array('jquery'));
    return esc_html($ica_renderable_output);
  }

  add_shortcode('ica_millage_compare', 'ica_render_table')
?>