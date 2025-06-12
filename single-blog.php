<?php get_header(); ?>

<main class="single-artist">
  <div class="container">
    <article class="artist-content">
      <div class="artist-thumbnail">
      <?php if (has_post_thumbnail()): ?>
  <div class="post-thumbnail">
    <?php the_post_thumbnail('medium'); ?>
  </div>
<?php else: ?>
  <div class="post-thumbnail fallback-thumbnail">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fallback.jpg" alt="Default image">
  </div>
<?php endif; ?>
      <h1 class="artist-name"><?php the_title(); ?></h1>
      <div class="artist-bio">
        <?php the_content(); ?>
      </div>
    </article>
  </div>
</main>

<?php get_footer(); ?>