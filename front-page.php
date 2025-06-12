<?php
/* Template Name: Front Page */
get_header();
?>

<main id="site-main">

  <!-- Hero Highlight -->
  <section class="home-banner">
  <div class="highlight-container">
    <div class="banner-wrapper">
      <img src="<?php echo get_theme_mod('mdmg_banner_bg'); ?>" alt="Banner Image" class="banner-img" />
      <div class="banner-text">
          <h1 class="banner-title"><?php echo get_theme_mod('mdmg_banner_title'); ?></h1>
          <p class="banner-date"><?php echo get_theme_mod('mdmg_banner_date'); ?></p>
          <p class="banner-desc"><?php echo get_theme_mod('mdmg_banner_desc'); ?></p>
          <a href="<?php echo get_theme_mod('mdmg_banner_link'); ?>" class="banner-button">
    <?php echo get_theme_mod('mdmg_banner_button_text'); ?>
  </a>
</div>
    </div>
  </div>
</section>

  <!-- Link Cards -->
  <div class="highlight-container">
  <div class="card-row">
  <section class="info-cards">
    <div class="card-grid">
      <a href="/events" class="card">
        <img src="<?php echo get_template_directory_uri(); ?>/images/EventsThumbnail.png" alt="Events">
        <h3>Events</h3>
        <p>Check out upcoming events in the area</p>
      </a>
      <a href="/artists" class="card">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ArtistThumbnail.png" alt="Artists">
        <h3>Artists</h3>
        <p>See what artists in the area are creating</p>
      </a>
      <a href="/about" class="card">
        <img src="<?php echo get_template_directory_uri(); ?>/images/AboutMIPThumbnail.png" alt="About MIP">
        <h3>About MIP</h3>
        <p>Learn more about Drexel’s Music Industry Production Program</p>
      </a>
    </div>
  </section>
  </div>
</div>

  <!-- Playlist -->
   <div class="mdmg-media-player">
  <section class="album-player">
  <div class="album-player-content">
    <?php $album_cover = get_field('album_cover'); ?>
    <?php if ($album_cover): ?>
      <img src="<?php echo esc_url($album_cover['url']); ?>" alt="<?php echo esc_attr($album_cover['alt']); ?>" />
    <?php endif; ?>

    <div class="album-info">
      <h2><?php the_field('album_title'); ?></h2>
      <p><?php the_field('album_artist'); ?></p>

      <div class="player-controls">
        <!-- Insert play button or controls -->
      </div>
    </div>

    <div class="tracklist">
      <div class="track">
        <span class="track-name"><?php the_field('track_1_name'); ?></span>
        <span class="track-length"><?php the_field('track_1_length'); ?></span>
      </div>
      <div class="track">
        <span class="track-name"><?php the_field('track_2_name'); ?></span>
        <span class="track-length"><?php the_field('track_2_length'); ?></span>
      </div>
      <!-- Repeat for however many tracks -->
    </div>
  </div>
</section>
    </div>

<!-- <?php 
if ( have_rows('Media Player') ) {
    echo 'ACF fields are working!';
} else {
    echo 'No ACF fields found.';
}
?> -->

  <!-- Artist Spotlight -->
  <section class="artist-spotlight">
    <h1>Check Out Some of Our Artists</h1>
      </br>
      </br>
  <a href="/artists">
    <img src="<?php echo get_template_directory_uri(); ?>/images/MoreArtists.png" alt="Featured Artist">
  </a>
  </section>

</main>

<?php get_footer(); ?>