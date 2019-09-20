<?php get_header(); ?>
 
<?php while(have_posts()) : the_post(); ?>

    <?php 

        $author  = get_post_meta( $id, 'gallery_item_author', true );
        $blurb   = get_post_meta( $id, 'gallery_item_blurb', true );

    ?>

<?php endwhile; ?>

<div class="modal">
   
    <div class="colour-block-modal" id="modalColour"></div>
    
    <div class="back-button" onclick="history.back();" id="backButton">
        <img src="<?php bloginfo('template_url'); ?>/assets/arrow.png" alt="arrow"> <span>Back</span>
    </div>
    
    <div class="modal-content">
        <div class="modal-image" id="modalImage">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="modal-text" id="modalText">
            <h2 class="modal-heading"><?php the_title() ?></h2>
            <span class="modal-author"><?= $author ?></span>
            <p class="modal-blurb"><?= $blurb ?></p>
        </div>
    </div>
    
</div>

<script>
    
    var colour = document.getElementById('modalColour');
    var backButton = document.getElementById('backButton');
    var image = document.getElementById('modalImage');
    var text = document.getElementById('modalText');
    
    document.body.onload = function(){
        colour.style.transform = 'translate(0,0)';
        backButton.style.opacity = 1;
        image.style.opacity = 1;
        image.style.transform = 'translate(0,0)';
        text.style.opacity = 1;
        text.style.transform = 'translate(0,0)';

    }
    
</script>

<?php get_footer(); ?>