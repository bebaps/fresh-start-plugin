<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Actions for when this plugin is activated.
 *
 * @package Fresh Start
 */
function fs_install()
{
  flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'fs_install');
