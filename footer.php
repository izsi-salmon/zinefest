<?php
    
        $email = $custom_logo = get_theme_mod('email_setting');
        $emailIcon = $custom_logo = get_theme_mod('email_icon_setting');
    
        $facebookLink = $custom_logo = get_theme_mod('facebook_link_setting');
        $facebookIcon = $custom_logo = get_theme_mod('facebook_icon_setting');
        
        $instagramLink = $custom_logo = get_theme_mod('instagram_link_setting');
        $instagramIcon = $custom_logo = get_theme_mod('instagram_icon_setting');
    
    ?>
    
    <?php if($email || $facebookLink || $instagramLink): ?>
        <div class="footer-overlay">
            <div class="footer">
                <div class="email-collumn">
                    <?php if($email): ?>
                        <p class="email-text"><?= $email ?></p>
                    <?php endif; ?>
                </div>
               <?php if($facebookLink || $instagramLink): ?>
                   <div class="social-media-collumn">
                        <?php if($facebookLink): ?>
                            <a href="<?= $facebookLink ?>" target="_blank" class="contact-icon"><img src="<?= $facebookIcon ?>" alt="Facebook Icon"></a>
                        <?php endif; ?>

                        <?php if($instagramLink): ?>
                            <a href="<?= $instagramLink ?>" target="_blank" class="contact-icon"><img src="<?= $instagramIcon ?>" alt="Instagram Icon"></a>
                        <?php endif; ?>
                   </div>
                <?php endif; ?>
                    
            </div>
        </div>
    <?php endif; ?>

    <?php wp_footer(); ?>
    
</body>
</html>