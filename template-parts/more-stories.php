<?php
// Exclude current post
$current_id = get_the_ID();

$more = new WP_Query([
  'posts_per_page' => 6,
  'post__not_in'   => [ $current_id ],
  'orderby'        => 'date',
  'order'          => 'DESC',
]);

if( $more->have_posts() ): ?>
  <section class="more-stories">
    <h2 class="section-heading">More Stories</h2>
    <button class="stories-nav prev" aria-label="Scroll Left">&larr;</button>
    <div class="stories-wrapper">
      <?php while( $more->have_posts() ): $more->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="story-card card">
          <div class="more-stories-thumbnail">
            <?php 
              if (has_post_thumbnail()) {
                the_post_thumbnail('medium');
              } else {
                echo '<div class="fallback-thumbnail"></div>';
              }
            ?>
          </div>
          <h2 class="story-card-title"><?php the_title(); ?></h3>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <button class="stories-nav next" aria-label="Scroll Right">&rarr;</button>
  </section>
<?php endif; ?>