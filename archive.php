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
          <h1 class="archive-title"> 
          <?php
            if (is_category()){
              single_cat_title();
            } else if (is_author()){
              the_post();
              echo 'Archives By Author: ' .get_the_author();
              rewind_posts();
            } else if (is_tag()){
              single_tag_title();
            } else if (is_day()){
              echo 'Archives By Day: ' .get_the_date();
            } else if(is_month()){
              echo 'Archives By Month: ' .get_the_date('F Y');
            } else if(is_year()){
              echo 'Archives By Year: ' .get_the_date('Y');
            } else {
              echo 'Archives';
            }
          ?>
          </h1>
              <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post();?>
                    <div class="archive-post">
                      <h4>
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title();?>
                        </a>
                      </h4>
                      <p>Posted on: <?php the_time('F j, Y');?></p>
                    
                    <br>
                        <a class="btn btn-color archive-btn" href="<?php the_permalink();?>">
                        Read More &raquo;
                      </a>
                      </div>
                <?php endwhile;?>
              <?php endif;?>
                        
        </div>
          <div class="col-md-4">
            <?php if(is_active_sidebar('sidebar')) : ?>
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
 <?php get_footer();?>



