<?php if (function_exists('get_field')) : ?>
    <?php $favicon = get_field('favicon_desktop', 'options');
    if ($favicon) { ?>
        <link rel="icon" href="<?php echo $favicon['url']; ?>" type="<?php echo $favicon['mime_type']; ?>"
              sizes="50x50">
    <?php } ?>
    <?php $favicon_iphone = get_field('favicon_iphone', 'options');
    if ($favicon_iphone) { ?>
        <link rel="apple-touch-icon" href="<?php echo $favicon_iphone['url']; ?>" sizes="60x60">
    <?php } ?>
    <?php $favicon_ipad = get_field('favicon_ipad', 'options');
    if ($favicon_ipad) { ?>
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon_ipad['url']; ?>">
    <?php } ?>
    <?php $favicon_iphone_retina = get_field('favicon_iphone_retina', 'options');
    if ($favicon_iphone_retina) { ?>
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_iphone_retina['url']; ?>">
    <?php } ?>
    <?php $favicon_ipad_retina = get_field('favicon_ipad_retina', 'options');
    if ($favicon_ipad_retina) { ?>
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon_ipad_retina['url']; ?>">
    <?php } ?>
<?php endif; ?>
