<?php get_header(); ?>

<main class="store-archive">
<?php
  $external_link = get_field('external_link');
?>
<a href="<?php echo esc_url($external_link); ?>" class="store-card" target="_blank" rel="noopener">
  <div class="card">
    <?php if (has_post_thumbnail()): ?>
      <?php the_post_thumbnail('medium'); ?>
    <?php endif; ?>
    <h3><?php the_title(); ?></h3>
    <h5><?php the_title(); ?></h5>
  </div>
</a>
</main>

<?php get_footer(); ?>