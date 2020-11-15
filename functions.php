<?php

// stop default js
function load_script()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
        if (is_page(is_page_template('page-whats-new.php'))) {
            wp_dequeue_style('wp-block-library');
        }
    }
}
add_action('wp_enqueue_scripts', 'load_script');

// add all css and js
function add_all_cssandjs()
{
    // wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js', [], time());
    // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', [], time());
    wp_enqueue_script('mainJs', get_stylesheet_directory_uri().'/bundle.js');
    // wp_localize_script('mainJs', 'myValues', [
    //     'ajax_url' => admin_url('admin-ajax.php'), //WordPressタグ等
    //     //いくつでも設定OK
    // ]);

    // css
    wp_enqueue_style('maincss', get_template_directory_uri().'/style.css', [], time());

    // wp_enqueue_script('easeScroll', get_stylesheet_directory_uri().'/src/assets/js/jquery.easeScroll.js', array('jquery'));
    // wp_enqueue_script('rellax', get_stylesheet_directory_uri().'/src/assets/js/rellax.min.js');
    // wp_enqueue_script('fullpage', get_stylesheet_directory_uri().'/src/assets/js/jquery.fullpage.min.js', array('jquery'));
    // wp_enqueue_script('mainJs', get_stylesheet_directory_uri().'/src/assets/js/main.js', array('jquery', 'tether', 'bootstrap', 'imagelightbox', 'rellax', 'easeScroll', 'fullpage'));

    // pass data js to wp
    // $phpDatas = array(
    //     'url' => get_stylesheet_directory_uri(),
    // );
    // wp_localize_script('mainJs', 'phpData', $phpDatas);
    // add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
}
add_action('wp_enqueue_scripts', 'add_all_cssandjs');

// function add_favicon()

    // echo '<link rel="shortcut icon" href=" '.get_stylesheet_directory_uri().'/src/assets/img/home/favicon.ico" type="image/x-icon" />'."\n";
    // echo '<link rel="apple-touch-icon" href=" '.get_stylesheet_directory_uri().'/src/assets/img/home/apple-touch-icon-180x180.png" type="image/x-icon" />'."\n";
    // echo '<link rel="icon" type="image/png" href="'.get_stylesheet_directory_uri().'/src/assets/img/home/icon-192x192.png" />'."\n";

// add_action('wp_head', 'add_favicon');

// title tag
add_theme_support('title-tag');

// navigation settings
function twpp_setup_theme()
{
    // register_nav_menu('global-nav-for-ramen', 'base nav');
    // register_nav_menu('global-nav-for-foodhall', 'sub nav');
}

add_action('after_setup_theme', 'twpp_setup_theme');

// add image size
add_image_size('bootsrap_thumb', 640, 360, true);
add_image_size('next_thumb_onSingle', 160, 90, true);

// add class into a tag on nav
// function wpse156165_menu_add_class($atts, $item, $args)
// {
//     $class = 'gray dropdown-item card-link d-block fSize1';
//     $atts['class'] = $class;

//     return $atts;
// }
// add_filter('nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3);

function thumb_up()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'thumb_up');

function view_seach_match_count()
{
}
add_action('wp_ajax_view_seach_match_count', 'view_seach_match_count');
add_action('wp_ajax_nopriv_view_seach_match_count', 'view_seach_match_count');

add_action('admin_menu', 'remove_menus');
function remove_menus()
{
    // remove_menu_page('index.php'); //ダッシュボード
    // remove_menu_page('edit.php'); //投稿メニュー
    // remove_menu_page('upload.php'); //メディア
    // remove_menu_page('edit.php?post_type=page'); //ページ追加
    // remove_menu_page('wpcf7');
    // remove_menu_page('edit-comments.php'); //コメントメニュー
    // remove_menu_page('themes.php'); //外観メニュー
    // remove_menu_page('plugins.php'); //プラグインメニュー
    // remove_menu_page('users.php'); //ユーザー
    // remove_menu_page('tools.php'); //ツールメニュー
    // remove_menu_page('options-general.php'); //設定メニュー
}

// セッションが必要な場合
// function init_session_start()
// {
//     session_start();
// }
// add_action('init', 'init_session_start');

// バーをすべてのユーザーで非表示
add_filter('show_admin_bar', '__return_false');

add_action('init', function () {
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function ($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = ture;

    return $init;
});

function register_my_menus()
{
    register_nav_menus([
    'main-menu' => 'Main Menu',
    'footer-menu' => 'Footer Menu',
  ]);
}
add_action('after_setup_theme', 'register_my_menus');

function new_submenu_class($menu)
{
    $menu = preg_replace('/ class="sub-menu"/', '/ class="collapse list-unstyled" id="pageSubmenu" /', $menu);

    return $menu;
}

add_filter('wp_nav_menu', 'new_submenu_class');

// メニューのliにクラス追加
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// コメントフォーム変更
function mytheme_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div class='comment_list' id="comment-<?php comment_ID(); ?>">
        <div class="comment-author">
            <?php echo get_avatar($comment); ?>
        </div>
        <div class="comment-contents">
            <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()); ?>
            <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.'); ?></em>
            <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata d-flex"><a
                    href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link(__('(Edit)'), '  ', ''); ?>
            </div>
            <?php comment_text(); ?>
            <div class="reply">
                <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
            </div>
        </div>
    </div>
</div>
<?php
}