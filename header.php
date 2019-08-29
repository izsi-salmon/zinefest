<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <?php
        $custom_logo = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($custom_logo, 'small');
    ?>
    
   <div class="header header-mobile">
       <div class="nav">
           <?php if ( has_nav_menu( 'header_nav' ) ) {
                 wp_nav_menu( array(
                    'theme_location' => 'header_nav'
                 ) );
            } ?>
        </div>
        <?php if ($custom_logo): ?>
            <div class="image-logo"><a href="<?= get_site_url(); ?>"><img src="<?= $logo_url ?>" alt="Logo" class="logo"></a></div>
        <?php else: ?>
            <div class="text-logo"><?= get_bloginfo('name'); ?></div>
        <?php endif; ?>
   </div>
   
   <div class="header header-desktop">
       <?php if ($custom_logo): ?>
            <div class="image-logo"><a href="<?= get_site_url(); ?>"><img src="<?= $logo_url ?>" alt="Logo" class="logo"></a></div>
        <?php else: ?>
            <div class="text-logo"><?= get_bloginfo('name'); ?></div>
        <?php endif; ?>
        <div class="nav">
           <?php if ( has_nav_menu( 'header_nav' ) ) {
                 wp_nav_menu( array(
                    'theme_location' => 'header_nav'
                 ) );
            } ?>
        </div>
   </div>
    