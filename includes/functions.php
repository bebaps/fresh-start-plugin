<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Debug and print some code to the screen.
 *
 * @method _fs_debug
 *
 * @param  mixed    $code  The code that you want to examine.
 * @param  boolean  $die   If the page should die or not after the code is examined.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_debug($code, $die = false)
{
  printf('<pre>%s</pre>', print_r($code, true));

  if ($die) {
    die;
  }
}
