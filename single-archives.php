<?php get_header(); ?>
<?php $title = get_the_title(); ?>

<?php
    $galleryArgs = array(
        'post_type' => $title,
        'posts_per_page' => -1
    );
    $gallery = new WP_Query($galleryArgs);
?>

<div class="main-content">
   
    <h1 class="page-title"><?= the_title(); ?></h1>
    <?php if( $gallery->have_posts() ): ?>
       <ul>
        <?php while($gallery->have_posts()): $gallery->the_post(); ?>

            <li><?= the_title(); ?></li>

        <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php get_footer(); ?>
    
</div>