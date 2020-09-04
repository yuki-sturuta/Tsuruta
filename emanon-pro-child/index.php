<?php
/**
* Main Template
* @package WordPress
* @subpackage Emanon_Pro
* @since Emanon Pro 1.0
*/

get_header(); ?>

<?php // ページレイアウトの表示判定
  $archive_layout_type = get_theme_mod( 'content_sidebar_layout', 'right_sidebar' );
  if ( $archive_layout_type == 'right_sidebar') {
    get_template_part( 'blog-templates/archive/right-sidebar-archive' );
  }
  if ( $archive_layout_type == 'left_sidebar' ) {
    get_template_part( 'blog-templates/archive/left-sidebar-archive' );
  }
  if ( $archive_layout_type == 'no_sidebar' ) {
    get_template_part( 'blog-templates/archive/no-sidebar-archive' );
  }
; ?>

<?php get_footer(); ?>