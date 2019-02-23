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

  // [iac_millage_compare type="area | city"]
  function iac_render_table ($attrs) {
    $a = shortcode_atts(array(
      'type' => 'area',
    ), $attrs);

    $iac_millage_to_render = 'templates/' . $a['type'] . '.php';
    $iac_renderable_output = require_once($iac_millage_to_render);

    $script_file = plugin_dir_url(__FILE__) . 'scripts/' . $a['type'] . '.js';
    wp_enqueue_script('iac_scripts', $script_file , array('jquery'));
    return esc_html($iac_renderable_output);
  }

  add_shortcode('iac_millage_compare', 'iac_render_table')
?>