<?php get_header(); ?>
<?php $title = get_the_title(); ?>

<?php
    $galleryArgs = array(
        'post_type' => $title,
        'posts_per_page' => -1
    );
    $gallery = new WP_Query($galleryArgs);
?>

<div class="gallery-collumn">
   <div class="collumn-colour-block"></div>
    <div class="main-content">

        <div class="back-button" onclick="history.back();">
            <img src="<?php bloginfo('template_url'); ?>/assets/arrow.png" alt="arrow"> <span>Back</span>
        </div>

        <h1 class="page-title gallery-title"><?= the_title(); ?></h1>

        <?php if( $gallery->have_posts() ): ?>
           <div class="gallery-container">
                <?php while($gallery->have_posts()): $gallery->the_post(); ?>
                    <?php if(has_post_thumbnail()): ?>

                        <a href="<?= esc_url(get_permalink()); ?>" class="gallery-image-container">
                            <?php the_post_thumbnail('large'); ?>
                        </a>

                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="no-events-text"><p>No items added to this archive yet, watch this space!</p></div>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>