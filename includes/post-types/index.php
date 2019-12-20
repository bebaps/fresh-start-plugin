<?php // Custom post types

function fresh_start_setup_post_type() {
  register_post_type( 'fresh_start_sample', ['public' => 'true'] );
}
add_action( 'init', 'fresh_start_setup_post_type' );
