<?php get_header(); ?>


<?php if( get_theme_mod('event_banner_setting')): ?>
   <div class="banner-img-container">
       <img src="<?php echo get_theme_mod( 'event_banner_setting'); ?>" alt="Latest event poster">
   </div>
   <div class="banner-link-container">
       <a href="#" class="banner-link">Check out this event</a>
   </div>
<?php endif ?>

   <div class="home-content">
       <div class="collumn">
           <div class="home-text-container">
               <h1 class="home-title"><?= get_bloginfo('name'); ?></h1>
               <p class="home-description"><?= get_bloginfo('description'); ?></p>
           </div>
       </div>
       <div class="collumn">
           <div class="home-image-container">
               <div class="colour-block"></div>
               <?php if( get_theme_mod('first_image_setting') && get_theme_mod('second_image_setting') && get_theme_mod('third_image_setting')): ?>
                   <div class="home-images">
                       <img src="<?php echo get_theme_mod( 'first_image_setting'); ?>" alt="">
                       <img src="<?php echo get_theme_mod( 'second_image_setting'); ?>" alt="">
                       <img src="<?php echo get_theme_mod( 'third_image_setting'); ?>" alt="">
                   </div>
               <?php endif ?>
           </div>
       </div>
   </div>
   
  <?php get_footer(); ?>