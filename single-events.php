<?php get_header(); ?>
<?php 
    $id= get_the_id();
    $post = get_post($id); 
    $content = apply_filters('the_content', $post->post_content); 
?>

<?php  if(has_post_thumbnail()): ?>
   <div class="banner-img-container">
       <?php the_post_thumbnail(); ?>
   </div>
<?php endif; ?>

<?php while(have_posts()) : the_post(); ?>
    <?php
        $eventLocation  = get_post_meta( $id, 'event_location', true );
        $eventDate      = get_post_meta( $id, 'event_date', true );
        $eventStartTime = get_post_meta( $id, 'event_start', true );
        $eventEndTime   = get_post_meta( $id, 'event_end', true );

        $regType1 = get_post_meta( $id, 'type_1', true ); $regLink1 = get_post_meta( $id, 'link_1', true );
        $regType2 = get_post_meta( $id, 'type_2', true ); $regLink2 =  get_post_meta( $id, 'link_2', true );
        $regType3 = get_post_meta( $id, 'type_3', true ); $regLink3 =  get_post_meta( $id, 'link_3', true );
    ?>
    <div class="main-content">
        <h1 class="event-title"><?= the_title(); ?></h1>
        
            <div class="event-details">
                <div><?= $eventDate ?></div>
                <div><?= $eventStartTime ?> <?php if($eventEndTime):?>to <?= $eventEndTime ?><?php endif; ?></div>
                <div><?= $eventLocation ?></div>
            </div>
            <?php if($regLink1 || $regLink2 || $regLink3): ?>
                <div class="registration-container">
                    <div class="registration">
                        <div class="registration-title"><h2>Register</h2></div>
                        <div>
                            <!--     Registration 1       -->
                            <?php if($regLink1): ?>
                                <p><a href="<?= $regLink1 ?>" target="_blank" class="registration-link"><span><?php if($regType1){echo $regType1;} else{echo $regLink1;} ?></span> <img src="<?php bloginfo('template_url'); ?>/assets/arrow.png" class="link-arrrow" alt="link arrow"></a></p>               
                            <?php endif ?>
                            <!--     Registration 2       -->
                            <?php if($regLink2): ?>
                                <p><a href="<?= $regLink2 ?>" target="_blank" class="registration-link"><span><?php if($regType2){echo $regType2;} else{echo $regLink2;} ?></span> <img src="<?php bloginfo('template_url'); ?>/assets/arrow.png" class="link-arrrow" alt="link arrow"></a></p>             
                            <?php endif ?>
                            <!--     Registration 3       -->
                            <?php if($regLink3): ?>
                                <p><a href="<?= $regLink3 ?>" target="_blank" class="registration-link"><span><?php if($regType3){echo $regType3;} else{echo $regLink3;} ?></span> <img src="<?php bloginfo('template_url'); ?>/assets/arrow.png" class="link-arrrow" alt="link arrow"></a></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="the-content"><?= get_the_content(); ?></div>
    </div>
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>