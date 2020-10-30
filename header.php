<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php bloginfo('name');?> | <?php is_front_page() ? bloginfo('description') : wp_title('');?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Blog Stylesheet -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <style>
        .showcase{
            height:<?php echo get_theme_mod('showcase_height', 700); ?>px;
            background:url(<?php echo get_theme_mod('showcase_image', get_bloginfo('template_url').'/img/coffee-Jumbotron.jpg'); ?>) no-repeat center center;
        }
    </style>
</head>
<body>
	<?php wp_head();?>
	<nav class="navbar navbar-expand-md navbar-light" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
     <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name');?></a>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    <form method="get" class="navbar-form navbar-right" role="search" action="<?php echo esc_url(home_url('/'));?>">
          <label for="navbar-search" class="sr-only"><?php _e('Search', 'textdomain');?></label>
          <div class="form-group mr-3">
            <input type="text" class="form-control" name="s" id="navbar-search">
          </div>
          <button type="submit" class="btn btn-outline-secondary"><?php _e('Search', 'textdomain');?></button>
    </form>
  </div>
  </nav>