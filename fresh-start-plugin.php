<?php
/**
 * Plugin Name:     Fresh Start Plugin
 * Description:     DESCRIPTION
 * Author:          NAME
 * Author URI:      DOMAIN.COM
 * Version:         1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

define('FS_VERSION', '1.0.0');

// Some WordPress tweaks
require_once dirname(__FILE__) . '/includes/functions.php';
require_once dirname(__FILE__) . '/includes/tweaks.php';

// Custom Post Types
require_once dirname(__FILE__) . '/post-types/sample.php';

// Advanced Custom Fields
require_once dirname(__FILE__) . '/advanced-custom-fields/settings-page.php';

// Activation and deactivation functions
require_once dirname(__FILE__) . '/includes/activator.php';
require_once dirname(__FILE__) . '/includes/deactivator.php';
