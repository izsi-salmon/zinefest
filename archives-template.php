<?php
/*
  Template Name: Archives Menu
  Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php
    $archiveArgs = array(
        'post_type' => 'archives',
        'posts_per_page' => -1
    );
    $archives = new WP_Query($archiveArgs);
?>
<div class="main-content">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?php if( $archives->have_posts() ): ?>
       <div class="archive-container">
        <?php while($archives->have_posts()): $archives->the_post(); ?>

            <a href="<?= esc_url(get_permalink()); ?>" class="archive-card">
                <div class="archive-card-image-container">
                    <?php the_post_thumbnail(); ?>
                    <div class="archive-card-colour-block"></div>
                </div>
                <div class="archive-card-title"><?php the_title(); ?></div>
            </a>

        <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>