<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Add an Advanced Custom Fields Theme Options page.
 *
 * @package Fresh Start
 */
if (function_exists('acf_add_options_page')) {
  acf_add_options_page([
    'page_title'  => 'Website Settings',
    'menu_title'  => 'Website Settings',
    'menu_slug'   => 'website-settings',
    'capability'  => 'edit_posts',
    'parent_slug' => 'options-general.php',
    'redirect'    => false
  ]);
}
