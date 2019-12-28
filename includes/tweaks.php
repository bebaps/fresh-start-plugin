<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Remove the default WordPress emojis.
 *
 * @method _fs_disable_wp_emojicons
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_disable_wp_emojicons()
{
  // Remove the emojis from being printed
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');

  // Filter to remove TinyMCE emojis
  add_filter('tiny_mce_plugins', '_fs_disable_emojicons_tinymce');
}

/**
 * Remove the default WordPress emojis from the TinyMCE editor.
 *
 * @method _fs_disable_emojicons_tinymce
 * @param  mixed  $plugins  Plugins using TinyMCE
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_disable_emojicons_tinymce($plugins)
{
  if (is_array($plugins)) {
    return array_diff($plugins, ['wpemoji']);
  } else {
    return [];
  }
}

add_action('init', '_fs_disable_wp_emojicons');

/**
 * Remove any automatic formatting from the editor.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
remove_filter('the_content', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');

/**
 * Remove stupid widgets.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');

/**
 * Remove stupid meta boxes.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_remove_meta_boxes()
{
  // Remove from posts
  remove_meta_box('postcustom', 'post', 'normal');
  remove_meta_box('trackbacksdiv', 'post', 'normal');
  remove_meta_box('commentstatusdiv', 'post', 'normal');
  remove_meta_box('commentsdiv', 'post', 'normal');
  remove_meta_box('authordiv', 'post', 'normal');

  // Remove from pages
  remove_meta_box('postcustom', 'page', 'normal');
  remove_meta_box('trackbacksdiv', 'page', 'normal');
  remove_meta_box('commentstatusdiv', 'page', 'normal');
  remove_meta_box('commentsdiv', 'page', 'normal');
  remove_meta_box('authordiv', 'page', 'normal');
}

add_action('admin_init', '_fs_remove_meta_boxes');

/**
 * Ensure only admin users receive update notifications.
 *
 * @method _fs_admin_notifications
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_admin_notifications()
{
  if (!current_user_can('update_plugins')) {
    add_action('init',
      create_function('$a',
        "remove_action( 'init', 'wp_version_check' );"),
      2);
    add_filter('pre_option_update_core',
      create_function('$a', 'return null;'));
  }
}

add_action('plugins_loaded', '_fs_admin_notifications');

/**
 * Remove some more stupid standard widgets.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_remove_widgets()
{
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
}

add_action('widgets_init', '_fs_remove_widgets');

/**
 * Customize the default ellipsis (...).
 *
 * @method _fs_read_more_excerpt
 *
 * @param  string  $more  The read more content.
 *
 * @return string The updated Read More string.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_read_more_excerpt($more)
{
  return '&hellip; <a href="' . get_permalink() . '">Continue reading <span class="meta-nav">&rarr;</span></a>';
}

add_filter('excerpt_more', '_fs_read_more_excerpt');

/**
 * Remove even more stupid widgets.
 *
 * @package Fresh Start
 * @since  1.0.0
 */
function _fs_wpdocs_remove_dashboard_widgets()
{
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');
}

add_action('wp_dashboard_setup', '_fs_wpdocs_remove_dashboard_widgets');
