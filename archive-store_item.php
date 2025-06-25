<?php get_header(); ?>

<main class="artist-archive">
  <h1 class="section-heading">Our Store</h1>

    <div class="card-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php 
          // Get the External Link and Price
          $link  = get_field('external_link');
          $price = get_field('price');
        ?>
        <a href="<?php echo esc_url($link); ?>" class="store-card" target="_blank" rel="noopener">
          <div class="store-thumbnail">
            <?php 
              if (has_post_thumbnail()) {
                the_post_thumbnail('medium');
              } else {
                // optional fallback if no featured image
                echo '<div class="fallback-thumbnail"></div>';
              }
            ?>
          </div>
          <h3 class="card-title"><?php the_title(); ?></h3>
          <?php if ($price): ?>
            <p class="card-price">$<?php echo esc_html($price); ?></p>
          <?php endif; ?>
        </a>
      <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>