<?php
  /**
   * Plugin Name: ICA Millage Compare
   * Description: Calculate and compare taxes based on surrounding millage rates and home value
   * Version: 0.1.0
   * Author: Mark Stahl
   * Author URI: http://github.com/mjstahl
   * License: MIT
   * License URI: https://mit-license.org/
   */

  // Abort if this file is called directly
  if (!defined('WPINC')) { die; }

  function iac_millage_settings() {
    add_option('iac_millage_display', 'area');
    register_setting('iac_millage_settings', 'iac_millage_display');
  }

  function iac_millage_settings_page() {
    return require_once('renderables/settings.php');
  }

  function iac_millage_register_settings_page() {
    add_options_page(
      'IAC Millage Compare Plugin',
      'IAC Millage',
      'manage_options',
      'iac-millage',
      'iac_millage_settings_page'
    );
  }

  add_action('admin_init', 'iac_millage_settings');
  add_action('admin_menu', 'iac_millage_register_settings_page');

  $iac_millage_to_render =
    'renderables/' . get_option('iac_millage_display') . '.php';
  return require_once($iac_millage_to_render);
?>