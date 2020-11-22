<?php
// 管理画面以外、wordpressでなく、CDNのJQueryを使用
function add_jquery_scripts()
{
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array());
  }
}
//read JS
function register_script()
{
  wp_register_script('custom', '/assets/js/custom.js');
  wp_register_script('faq', '/assets/js/faq.js');
  wp_register_script('simulator', '/assets/js/simulator.js');
}
function add_script()
{
  register_script();
  wp_enqueue_script('custom');

  if (is_page('faq')) {
    wp_enqueue_script('faq');
  } else{
    wp_enqueue_script('simulator');
  }
}
//read CSS
function register_style()
{
  wp_register_style('common-style', '/assets/css/common.css');
  wp_register_style('reset', '/assets/css/reset.css');
  wp_register_style('header', '/assets/css/header.css');
  wp_register_style('footer', '/assets/css/footer.css');
  wp_register_style('top', '/assets/css/index.css');
  wp_register_style('strengths', '/assets/css/strengths.css');
  wp_register_style('office', '/assets/css/office.css');
  wp_register_style('staff', '/assets/css/staff.css');
  wp_register_style('price', '/assets/css/price.css');
  wp_register_style('faq', '/assets/css/faq.css');
  wp_register_style('news', '/assets/css/news.css');
  wp_register_style('souzoku', '/assets/css/souzoku.css');
  wp_register_style('contact', '/assets/css/contact.css');
  wp_register_style('privacypolicy', '/assets/css/policy.css');
}
function add_stylesheet()
{
  // 共通
register_style();
wp_enqueue_style('reset');
wp_enqueue_style('common-style');
wp_enqueue_style('header');
wp_enqueue_style('footer');

  if (is_front_page()) {
        wp_enqueue_style('top');
      } elseif (is_page('strengths')) {
        wp_enqueue_style('strengths');
    } elseif (is_page('office')) {
        wp_enqueue_style('office');
    } elseif (is_page('staff')) {
        wp_enqueue_style('staff');
    } elseif (is_page('price')) {
        wp_enqueue_style('price');
    } elseif (is_page('faq')) {
        wp_enqueue_style('faq');
    } elseif (is_archive('news')) {
        wp_enqueue_style('news');
    } elseif (is_singular('news')) {
        wp_enqueue_style('news');
    } elseif (is_page('privacypolicy')) {
        wp_enqueue_style('privacypolicy');
    }elseif (is_page('contact')) {
        wp_enqueue_style('contact');
    } elseif (is_page('thanks')) {
        wp_enqueue_style('contact');
    }elseif (array(is_page('souzoku'),is_page('seizen'),is_page('shinkoku'),is_page('flow'),is_page('simulator'))) {
        wp_enqueue_style('souzoku');
    } 
//   if (is_front_page()) {
//     wp_enqueue_style('top');
//   } elseif (is_singular('test')) {
//     wp_enqueue_style('test');
//   } elseif (is_page('test')) {
//     wp_enqueue_style('test');
//     wp_enqueue_style('faq');
//   } elseif (is_post_type_archive('test')) {
//     wp_enqueue_style('test');
//   }

}
add_action('wp_enqueue_scripts', 'add_jquery_scripts');
add_action('wp_enqueue_scripts', 'add_stylesheet');
add_action('wp_enqueue_scripts', 'add_script');
add_theme_support('post-thumbnails');

// カスタム投稿
add_action('init', 'create_post_type');
function create_post_type()
{
  register_post_type('news', [
    'labels' => [
      'name'          => 'お知らせ',
      'singular_name' => 'news',
    ],
    'public'        => true,
    'has_archive'   => true,
    'menu_position' => 4,
    'show_in_rest'  => true,
  ]);
}

/* カスタムタクソノミーを作成 */
register_taxonomy(
  'news_category',       // タクソノミーのスラッグ
  'news', // どの投稿タイプに追加するか
  [
    'labels' => [
      'name' => 'お知らせカテゴリー'
    ],
    'hierarchical' => true,
    'public'        => true,
  ]
);

// 非表示
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
    remove_menu_page( 'edit.php' ); //投稿メニュー
}


//サンクスページ
add_action( 'wp_footer', 'add_thanks_page' );
function add_thanks_page() {
echo <<< EOD
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = 'contact/thanks/'; /* 遷移先のURL */
}, false );
</script>
EOD;
}