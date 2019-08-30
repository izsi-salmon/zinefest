<?php
/*
  Template Name: Events Menu
  Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 
?>

<?php
    $eventArgs = array(
        'post_type' => 'events',
        'posts_per_page' => -1
    );
    $events = new WP_Query($eventArgs);
?>

<div class="main-content">
    <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if($content !== ''): ?>
            <div class="events-content">
                <?= $content ?>
            </div>
        <?php endif; ?>
</div>
   
    <?php if( $events->have_posts() ): ?>
        <div class="flex-container">

               <div class="event-row">
                    <?php while($events->have_posts()): $events->the_post(); ?>
                       <?php 
                        $eventSummary =  get_post_meta( $id, 'event_summary', true );
                        $eventLocation =  get_post_meta( $id, 'event_location', true );
                        $eventDate =  get_post_meta( $id, 'event_date', true );
                        ?>

                       <div class="event-card">
                            <a class="event-card-image-container"><?php the_post_thumbnail('medium'); ?></a>
                            <div class="event-card-text">
                                <h4 class="event-card-title"><a href="<?= esc_url(get_permalink()) ?>"><?= the_title(); ?></a></h4>
                                <p class="event-card-date"><?= $eventDate ?></p>
                                <p class="event-card-description"><?= $eventSummary ?></p>
                                <p class="event-card-location"><?= $eventLocation ?></p>
                                <div class="event-link-wrapper"><a class="event-card-link" href="<?= esc_url(get_permalink()) ?>">Discover more</a></div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
                
            </div>
        <?php else: ?>
            <div class="no-events-text"><p>There are currently no events coming up, check out our facebook and instagram to see previous events.</p></div>
    <?php endif; ?>


<?php get_footer(); ?>