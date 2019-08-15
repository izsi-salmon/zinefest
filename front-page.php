<?php get_header(); ?>

<?php $featuredbannerImg = true; ?>
<?php if ($featuredbannerImg): ?>
   <div class="banner-img-container">
       <img src="" alt="">
   </div>
   <div class="banner-link-container">
       <span class="banner-link">Check out this event</span>
   </div>
<?php endif ?>

   <div class="home-content">
       <div class="collumn">
           <div class="home-text-container">
               <h1 class="home-title"><?= get_bloginfo('name'); ?></h1>
               <p class="home-description"></p>
           </div>
       </div>
       <div class="collumn">
           <div class="home-image-container">
               <div class="colour-block"></div>
               <div class="home-images">
                   <img src="" alt="">
                   <img src="" alt="">
                   <img src="" alt="">
               </div>
           </div>
       </div>
   </div>