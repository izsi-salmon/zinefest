<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
   
    <?php if ($custom_logo): ?>
        <a href="<?= get_site_url(); ?>"><img src="<?= $logo_url ?>" alt="Logo" class="logo"></a>
    <?php endif; ?>