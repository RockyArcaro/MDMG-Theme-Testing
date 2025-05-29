<?php get_header(); ?>

<main class="single-post-page">
  <div class="post-hero">
    <div class="post-thumbnail">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large'); ?>
      <?php endif; ?>
    </div>
    <div class="post-meta">
      <div class="category-label"><?php the_category(', '); ?></div>
      <div class="post-date"><?php echo get_the_date(); ?></div>
      <h1 class="post-title"><?php the_title(); ?></h1>
<?php if (get_field('blog_excerpt')): ?>
  <p class="post-excerpt"><?php the_field('blog_excerpt'); ?></p>
<?php else: ?>
  <p class="post-excerpt"><?php the_excerpt(); ?></p>
<?php endif; ?>      <?php if (get_field('author_name')): ?>
  <p class="post-author">By <?php the_field('author_name'); ?></p>
<?php endif; ?>
    </div>
  </div>

  <div class="post-content">
    <?php the_content(); ?>
  </div>

  <div class="author-bio">
    <div class="author-avatar"><?php echo get_avatar(get_the_author_meta('ID'), 96); ?></div>
    <div class="author-info">
      <h3><?php the_author(); ?></h3>
      <p><?php the_author_meta('description'); ?></p>
      <div class="author-socials">
        <!-- Manually add social icons or use ACF fields -->
      </div>
    </div>
  </div>

  <?php
  // Optional: Include more stories section
  get_template_part('template-parts/more', 'stories');
  ?>

</main>

<?php get_footer(); ?>