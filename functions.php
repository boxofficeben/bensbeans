<?php

require_once('widgets/class-wp-widget-categories.php');
require_once('widgets/class-wp-widget-recent-posts.php');
require_once('widgets/class-wp-widget-media-gallery.php');

// Register Custom Navigation Walker
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// Theme Support
function bensbeans_theme_support(){
    // Nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu')
    ));

    // Featured Image
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size( 250, 250, true ); // default Post Thumbnail dimensions (cropped)
    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
 }


add_action('after_setup_theme', 'bensbeans_theme_support');

// Excerpt Length
	function adv_set_excerpt_length(){
		return 25;
	}
add_filter('excerpt_length', 'adv_set_excerpt_length');

// Add Customizer Functionality
require get_template_directory(). '/inc/customizer.php';

// Widget location
function init_widgets($id){
    register_sidebar(array(
        'name' 	=> 'Sidebar',
		'id'	=> 'sidebar',
		'before_widget'	=> '<div class="card sidebar-card">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="card-header"><h4 class="card-title">',
		'after_title'	=> '</h4></div>'
    ));

    register_sidebar(array(
        'name' => 'Bottom',
        'id' => 'bottom',
        'before_widget' => '<div class="container text-center text-md-left">',
        'after_widget' => '</div>'
    ));

     register_sidebar(array(
        'name'  => 'Home Sidebar',
        'id'    => 'home-sidebar',
        'before_widget' => '<div class="card sidebar-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="card-header"><h4 class="card-title">',
        'after_title'   => '</h4></div>'
    ));
 register_sidebar(array(
        'name'  => 'Footer One',
        'id'    => 'footer1',
        'before_widget' => '<div class="card sidebar-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="card-header"><h4 class="card-title">',
        'after_title'   => '</h4></div>'
    ));
  register_sidebar(array(
        'name'  => 'Footer Two',
        'id'    => 'footer2',
        'before_widget' => '<div class="card sidebar-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="card-header"><h4 class="card-title">',
        'after_title'   => '</h4></div>'
    ));
   register_sidebar(array(
        'name'  => 'Footer Three',
        'id'    => 'footer3',
        'before_widget' => '<div class="card sidebar-card">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="card-header"><h4 class="card-title">',
        'after_title'   => '</h4></div>'
    ));

}

add_action('widgets_init', 'init_widgets');

// Adds 'list-group-item' to categories li
function add_new_class_list_categories($list){
    $list = str_replace('cat-item', 'cat-item list-group-item', $list);
    return $list;
}

add_filter('wp_list_categories', 'add_new_class_list_categories');

// Register Widgets
function bensbeans_register_widgets(){
    register_widget('WP_Widget_Recent_Posts_Custom');
    register_widget('WP_Widget_Categories_Custom');
    register_widget('WP_Widget_Media_Gallery_Custom');
}

add_action('widgets_init', 'bensbeans_register_widgets');

// Add Comments
function add_theme_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li class="comment-item"';
        $add_below = 'div-comment';
    }
?>

<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>

    <div class="col-md-3 avatar-pic">
        <div class="comment-author vcard">
            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
        </div>
    </div>

    <div class="col-md-12">
        <?php if ( $comment->comment_approved == '0' ) : ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
            <br />
        <?php endif; ?>

        <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php
                /* translators: 1: date, 2: time */
                printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
            ?>
        </div>

        <?php comment_text(); ?>

        <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
    </div>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}

//Get Top Parent Page
    function get_top_parent(){
        global $post;
        if($post->post_parent){
            $ancestors = get_post_ancestors($post->ID);
            return $ancestors[0];
        }

        return $post->ID;
    }

    function page_is_parent(){
        global $post;

        $pages = get_pages('child_of='.$post->ID);
        return count($pages);
    }