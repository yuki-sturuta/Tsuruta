<?php
/**
* Emanon Pro child function
*/

// 圧縮版style.cssの読み込み切り替え
function emanon_enqueue_style() {
  $css_minified = get_theme_mod( 'css_minified', '' );
  if ( $css_minified ) {
    wp_enqueue_style( 'emanon-style-min', get_template_directory_uri() . '/style-min.css' );
      } else {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/lib/css/animate.min.css' );
  }
}

// style.cssの統合
function emanon_css_compression() {

  $parent_css = TEMPLA . '/style.css';
  $child_css = STYLE . '/style.css';
  $animate_css = TEMPLA . '/lib/css/animate.min.css';

  $css = '';

if ( WP_Filesystem() ) {//WP_Filesystemの初期化
  global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
  if( is_file( $parent_css ) ) $css .= $wp_filesystem->get_contents( $parent_css );
  if( is_file( $child_css ) ) $css .= $wp_filesystem->get_contents( $child_css );
  if( is_file( $animate_css ) ) $css .= $wp_filesystem->get_contents( $animate_css );
}

// CSS 圧縮
if( class_exists('CSSmin') ) {
    $minify = new CSSmin();
    if( method_exists( $minify, "run" ) ) {
        $css = trim( $minify->run( $css ) );
    }

  $style_min = TEMPLA . '/style-min.css';

  // 圧縮後のCSSファイル保存
  if ( WP_Filesystem() ) {//WP_Filesystemの初期化
    global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
    //$wp_filesystemオブジェクトのメソッドとしてファイルに書き込む
    $wp_filesystem->put_contents( $style_min, $css );
  }

  return;

  }
}
add_action( 'customize_save_after', 'emanon_css_compression', 10, 1 );


//子テーマ用のビジュアルエディタースタイル
add_editor_style( 'lib/css/editor-style.css' );

//Emanon Pro 子テーマ用の関数を以下に記述

// Site name
function yk_get_emanon_footer_copyright() {
  $footer_copyright_text = '&nbsp;'.get_bloginfo( 'name' );
  $footer_copyright_text = apply_filters( 'emanon_footer_custom_copyright_text', $footer_copyright_text );
  return strip_tags( $footer_copyright_text );
}

// Powered by emanon
function yk_emanon_footer_copy() {
  $yk_powered_by_year = date('Y');
  $powered_by =  '.All Rights Reserved.';
  $powered_by = apply_filters( 'emanon_footer_custom_powered_by', $powered_by );
  echo '<div class="copyright">' . "\n";
  echo '<small><a href="' . esc_url( home_url() ) . '">' .'&copy;' . $yk_powered_by_year . esc_html( yk_get_emanon_footer_copyright() ) . '</a>' . $powered_by . '</small>' . "\n";
  echo '</div>' . "\n";
}