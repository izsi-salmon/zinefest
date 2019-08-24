<?php get_header(); ?>
<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 
?>

<div class="main-content">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?= $content ?>
</div>