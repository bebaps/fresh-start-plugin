<?php
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Register a Sample Custom Post Type.
 *
 * @package Fresh Start
 */
if (!function_exists('fs_create_sample_cpt')) {
  function fs_create_sample_cpt()
  {
    $labels = [
      'name'                  => _x('Samples', 'Post Type General Name', 'fresh-start'),
      'singular_name'         => _x('Sample', 'Post Type Singular Name', 'fresh-start'),
      'menu_name'             => _x('Samples', 'Admin Menu text', 'fresh-start'),
      'name_admin_bar'        => _x('Sample', 'Add New on Toolbar', 'fresh-start'),
      'archives'              => __('Sample Archives', 'fresh-start'),
      'attributes'            => __('Sample Attributes', 'fresh-start'),
      'parent_item_colon'     => __('Parent Sample:', 'fresh-start'),
      'all_items'             => __('All Samples', 'fresh-start'),
      'add_new_item'          => __('Add New Sample', 'fresh-start'),
      'add_new'               => __('Add New', 'fresh-start'),
      'new_item'              => __('New Sample', 'fresh-start'),
      'edit_item'             => __('Edit Sample', 'fresh-start'),
      'update_item'           => __('Update Sample', 'fresh-start'),
      'view_item'             => __('View Sample', 'fresh-start'),
      'view_items'            => __('View Samples', 'fresh-start'),
      'search_items'          => __('Search Sample', 'fresh-start'),
      'not_found'             => __('Not found', 'fresh-start'),
      'not_found_in_trash'    => __('Not found in Trash', 'fresh-start'),
      'featured_image'        => __('Featured Image', 'fresh-start'),
      'set_featured_image'    => __('Set featured image', 'fresh-start'),
      'remove_featured_image' => __('Remove featured image', 'fresh-start'),
      'use_featured_image'    => __('Use as featured image', 'fresh-start'),
      'insert_into_item'      => __('Insert into Sample', 'fresh-start'),
      'uploaded_to_this_item' => __('Uploaded to this Sample', 'fresh-start'),
      'items_list'            => __('Samples list', 'fresh-start'),
      'items_list_navigation' => __('Samples list navigation', 'fresh-start'),
      'filter_items_list'     => __('Filter Samples list', 'fresh-start'),
    ];

    $rewrite = [
      'slug'       => 'samples',
      'with_front' => true,
      'pages'      => true,
      'feeds'      => true,
    ];

    $args = [
      'label'               => __('Sample', 'fresh-start'),
      'description'         => __('A sample custom post type.', 'fresh-start'),
      'labels'              => $labels,
      'menu_icon'           => 'dashicons-admin-site-alt3',
      'supports'            => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'],
      'taxonomies'          => [],
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 20,
      'show_in_admin_bar'   => true,
      'show_in_nav_menus'   => true,
      'can_export'          => true,
      'has_archive'         => true,
      'hierarchical'        => false,
      'exclude_from_search' => false,
      'show_in_rest'        => true,
      'rest_base'           => 'samples',
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => $rewrite,
    ];

    register_post_type('sample', $args);
  }

  add_action('init', 'fs_create_sample_cpt', 0);
}
