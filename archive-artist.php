<?php get_header(); ?>

<main class="artist-archive">
  <h1>Our Artists</h1>

  <div class="artist-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="artist-card">
        <div class="artist-card-inner">
          <?php if (has_post_thumbnail()) : ?>
            <div class="artist-thumbnail">
              <?php the_post_thumbnail('medium'); ?>
            </div>
          <?php endif; ?>
          <h2 class="artist-name"><?php the_title(); ?></h2>
        </div>
      </a>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>