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
              <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post();?>
                <article class="card">
                   <?php
                $args = array( 'numberposts' => 1 );
                $lastposts = get_posts( $args );
                foreach($lastposts as $post) : setup_postdata($post); ?>
                <h2 class="card-header"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                 <div class="card-body">
                 <div class="front-page-thumbnail">
                 <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('medium');?>
                  <?php endif;?>
                 </div>
                 <div class="font-page-excerpt">
                   <p class="meta">
                         <?php the_time('F j, Y');?>
                           |
                          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><strong><?php the_author();?></strong></a> |
                          in
                         <?php 
                            $categories = get_the_category();
                            $separator = ", ";
                            $output = '';

                            if($categories){
                              foreach($categories as $category){
                                $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'. $separator;
                              }
                            }

                            echo trim($output, $separator);
                          ?>
                        </p>
                  <?php the_excerpt(); ?>
                   <br>
                        <a class="btn btn-color" href="<?php the_permalink();?>">
                        Read More &raquo;
                      </a>
                      <hr>
                      <?php if(the_tags()) : ?>
                        <?php if(function_exists('the_tags')) { ?>
                          <strong>Tags: </strong>
                          <?php the_tags('', '', ''); ?> <br> <?php } ?>
                          <?php endif;?>
                  </div>
                <?php endforeach; ?>
                </div>
                    </article>
                <?php endwhile;?>
              <?php endif;?>
              </div>
                <div class="col-md-4">
                <?php if(is_active_sidebar('home-sidebar')) : ?>
               <?php dynamic_sidebar('home-sidebar'); ?>
              <?php endif; ?>
            </div>
            <div class="col-md-12">
              <div class="row callout">
              <div class="col-md-4">
              <?php if(is_active_sidebar('footer1')) :?>
                <?php dynamic_sidebar('footer1');?>
              <?php endif; ?>
              </div>
              <div class="col-md-4">
                <?php if(is_active_sidebar('footer2')) :?>
                <?php dynamic_sidebar('footer2');?>
              <?php endif; ?>
              </div>
              <div class="col-md-4">
                <?php if(is_active_sidebar('footer3')) :?>
                <?php dynamic_sidebar('footer3');?>
              <?php endif; ?>
              </div>
            </div>
            </div>
             <?php if(is_active_sidebar('bottom')) : ?>
            <?php dynamic_sidebar('bottom'); ?>
        <?php endif; ?>
        </div>
        </div>
    </div>       
</main>
 <?php get_footer();?>



