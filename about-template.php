<?php
/*
  Template Name: About Page
  Template Post Type: page
*/
?>

<?php get_header(); ?>
<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 
?>

<?php $addParagTitle = get_post_meta( $id, 'add_parag_title', true ); ?>
<?php $addParag = get_post_meta( $id, 'add_parag', true ); ?>

<?php  if(has_post_thumbnail()): ?>
    <div class="about-page-content">
       <h1 class="page-title"><?php the_title(); ?></h1>
       <div class="about-flex">
           <div class="about-content">
               <?= $content ?>
           </div>
           <div class="about-image-staples">
               <?php the_post_thumbnail(); ?>
               <img src="<?php bloginfo('template_url'); ?>/assets/staple.png" alt="staple" class="staple staple-top-left">
               <img src="<?php bloginfo('template_url'); ?>/assets/staple.png" alt="staple" class="staple staple-bottom-right">
           </div>
       </div>        
        <?php if($addParag): ?>
            <div class="add-parag-wrapper">
               <div class="colour-block-about"></div>
                <h2><?= $addParagTitle; ?></h2>
                <p><?= $addParag; ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="main-content">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?= $content ?>
        <?php if($addParag): ?>
            <div class="add-parag-wrapper">
                <div class="colour-block-about"></div>
                <h2><?= $addParagTitle; ?></h2>
                <p><?= $addParag; ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php get_footer(); ?>