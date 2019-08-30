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
    
        $email = $custom_logo = get_theme_mod('email_setting');
        $emailIcon = $custom_logo = get_theme_mod('email_icon_setting');
    
        $facebookLink = $custom_logo = get_theme_mod('facebook_link_setting');
        $facebookIcon = $custom_logo = get_theme_mod('facebook_icon_setting');
        
        $instagramLink = $custom_logo = get_theme_mod('instagram_link_setting');
        $instagramIcon = $custom_logo = get_theme_mod('instagram_icon_setting');
    
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
        <div class="contact">
            <div class="contact-icons">                
                <?php if($facebookLink): ?>
                    <a href="<?= $facebookLink ?>" target="_blank" class="contact-icon"><img src="<?= $facebookIcon ?>" alt="Facebook Icon"></a>
                <?php endif; ?>
                
                <?php if($instagramLink): ?>
                    <a href="<?= $instagramLink ?>" target="_blank" class="contact-icon"><img src="<?= $instagramIcon ?>" alt="Instagram Icon"></a>
                <?php endif; ?>
                
                <?php if($email): ?>
                    <div class="email-icon-wrapper contact-icon">
                        <img src="<?= $emailIcon ?>" class="email-icon" alt="Email icon">
                        <p class="email-text"><?= $email ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
   </div>
    