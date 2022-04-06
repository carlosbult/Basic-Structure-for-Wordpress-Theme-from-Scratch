<?php if (is_active_sidebar('sidebar')) : ?>
    <?php dynamic_sidebar('sidebar'); ?>
<?php else : ?>
    <h2>No sidebar register</h2>
<?php endif; ?>