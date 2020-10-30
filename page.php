<?php get_header(); ?>

<main>

  <!--Heading Image-->

  <section class="view showcase">

    <div class="mask rgba-black-strong">

      <div class="container-fluid d-flex align-items-center justify-content-center h-100">

        <div class="row d-flex justify-content-center text-center showcase-content w-100">

          <div class="col-md-10">

            <!-- Heading -->
            <h1><?php echo get_theme_mod('showcase_heading', 'Bens Beans Theme'); ?></h1>

            <!-- Divider -->
            <hr class="hr-light hr-heading">
            <h3 class="lead"><?php echo get_theme_mod('showcase_text', 'A Wordpress Theme By you'); ?></h3>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!--Heading Image-->
  <div class="container index">
    <div class="row">
      <div class="col-md-8">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <article class="page">
              <div class="row">
                <h2 class="parent-title"><?php the_title(); ?></h2>
                <nav class="nav sub-nav">
                  <ul>
                    <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_parent()); ?>"><?php echo get_the_title(get_top_parent()); ?></a></span>
                    <?php
                    $args = array(
                      'child_of' => get_top_parent(),
                      'title_li' => ''

                    );
                    ?>
                    <?php wp_list_pages($args); ?>
                  </ul>
                </nav>
                <?php the_content(); ?>
              </div>
            </article>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
      <div class="col-md-4">
        <?php if (is_active_sidebar('sidebar')) : ?>
          <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="container text-center text-md-left">
      <hr>
      <!-- Call to action -->
      <ul class="list-unstyled list-inline text-center py-2 sign-up-register">
        <li class="list-inline-item">
          <h5 class="mb-1">Register for our Newsletter</h5>
        </li>
        <li class="list-inline-item">
          <a href="#!" class="btn btn-color btn-rounded">Sign up!</a>
        </li>
      </ul>
    </div>
  </div>
</main>
<?php get_footer(); ?>