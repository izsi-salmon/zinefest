<?php get_header(); ?>

<?php
    $eventArgs = array(
        'post_type' => 'events',
        'posts_per_page' => -1
    );
    $events = new WP_Query($eventArgs);
    
    $featuredEvent = false;
    $featuredEventBanner;
    $featuredEventLink;
?>

<?php if( $events->have_posts() ): ?>
   <?php while($events->have_posts()): $events->the_post(); ?>
     <?php $featured =  get_post_meta( $id, 'featured', true ); ?>
       <?php if($featured){
                $featuredEvent = true;
                if(has_post_thumbnail()){
                    $featuredEventBanner = get_the_post_thumbnail_url();
                    $featuredEventLink = esc_url(get_permalink());
                }
            }
        ?>
   <?php endwhile; ?>
<?php endif; ?>
   
<?php if($featuredEvent === true): ?>
   <div class="banner-img-container">
       <img src="<?= $featuredEventBanner; ?>" alt="Latest event poster">
   </div>
   <div class="banner-link-container">
       <a href="<?= $featuredEventLink; ?>" class="banner-link">Check out this event</a>
   </div>
<?php else: /* Display banner from customiser */ ?>
   <?php if( get_theme_mod('homepage_banner_setting')): ?>
      <div class="banner-img-container">
          <img src="<?php echo get_theme_mod( 'homepage_banner_setting'); ?>" alt="Latest event poster">
      </div>
      <div class="no-link-margin"></div>
   <?php endif; ?>
<?php endif; ?>

<div class="home-content">
   <div class="collumn collumn-text">
       <div class="home-text-container">
           <h1 class="home-title"><?= get_bloginfo('name'); ?></h1>
           <p class="home-description"><?= get_bloginfo('description'); ?></p>
       </div>
   </div>
   <div class="collumn collumn-images">
       <div class="home-image-container">
           <div class="colour-block-home"></div>
           <?php if( get_theme_mod('first_image_setting') && get_theme_mod('second_image_setting') && get_theme_mod('third_image_setting')): ?>
               <div class="home-images">
                   <img src="<?php echo get_theme_mod( 'first_image_setting'); ?>" class="home-image-1" alt="">
                   <img src="<?php echo get_theme_mod( 'second_image_setting'); ?>" class="home-image-2" alt="">
                   <img src="<?php echo get_theme_mod( 'third_image_setting'); ?>" class="home-image-3" alt="">
               </div>
           <?php endif ?>
       </div>
   </div>
</div>

<?php get_footer(); ?>
  
  