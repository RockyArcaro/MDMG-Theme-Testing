<?php get_header(); ?>

<main class="blog-archive">
  <div class="container">
    <div class="card-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="artist-card">
          <div class="artist-card-inner">
            <div class="artist-thumbnail">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium');
              } ?>
            </div>
            <h2 class="artist-name"><?php the_title(); ?></h2>
          </div>
        </a>
      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>