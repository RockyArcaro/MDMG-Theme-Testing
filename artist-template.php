<?php
    /*Template Name: Artist Template*/
?>
<?php get_header(); ?>

<div class="artist-page">
    <div class="artist-container">
        <h1 class="page-title">Our Artists</h1>
        
        <!-- 艺术家列表 -->
        <div class="artist-list">
            <?php   
                $args = array(
                    'post_type' => 'artist',
                    'posts_per_page' => -1,
                );  
                
                $artists_query = new WP_Query($args);

                if($artists_query->have_posts()) :
                    while($artists_query->have_posts()) : $artists_query->the_post();
                        ?>  
                        <div class="artist-item">
                            <?php the_post_thumbnail('thumbnail'); ?>
                            <h2 class="artist-name"><?php the_title(); ?></h2>
                            <div class="artist-description">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
            ?>
        </div>
    </div>
</div>


        
