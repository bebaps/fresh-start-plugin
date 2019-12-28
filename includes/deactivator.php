<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Actions for when this plugin is deactivated.
 *
 * @package Fresh Start
 */
function fs_deactivation()
{
  unregister_post_type('sample');
  flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'fs_deactivation');
