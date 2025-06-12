<?php
/**
 * Template for Blog Posts Page (home.php)
 */
get_header(); ?>
</br>
</br>

</br>

<main class="blog-archive">
  <h2 class="section-heading">Latest Blog Posts</h2>
  
  <div class="card-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="custom-blog-card">
        <div class="card-image">
          <?php if (has_post_thumbnail()) {
            the_post_thumbnail('medium');
          } ?>
        </div>
        <h3 class="card-title"><?php the_title(); ?></h3>
      </a>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>